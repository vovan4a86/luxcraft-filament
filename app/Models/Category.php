<?php

namespace App\Models;

use App\Traits\HasH1;
use App\Traits\HasSeo;
use App\Traits\OgGenerate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\URL;
use SolutionForest\FilamentTree\Concern\ModelTree;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @property int $parent_id
 * @property int $published
 * @property string $slug
 * @property array $children
 * @method static getTopLevelOnList()
 */
class Category extends Model implements HasMedia
{
    use HasH1, HasSeo, OgGenerate, ModelTree, InteractsWithMedia;

    protected $fillable = ['name', 'parent_id', 'h1', 'alias', 'slug', 'announce',
        'image', 'text', 'title', 'description', 'og_title', 'og_description', 'og_image',
        'keywords', 'order', 'published', 'on_header', 'on_footer'];

    protected array $_parents = [];
    protected bool $_has_children = false;
    private ?string $_url = null;
    private bool $_disableEventUpdateSlug = false;
    private bool $_disableEventUpdatePublished = false;

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('admin_thumb')
            ->fit(Manipulations::FIT_CONTAIN, 100, 100)
            ->nonQueued();
        $this
            ->addMediaConversion('catalog_main_page')
            ->fit(Manipulations::FIT_CONTAIN, 215, 215)
            ->nonQueued();
        $this
            ->addMediaConversion('catalog_item')
            ->fit(Manipulations::FIT_CONTAIN, 353, 210)
            ->nonQueued();
    }


    public static function boot()
    {
        parent::boot();

        self::saved(
            function (self $category) {
                if ($category->isDirty('alias') || $category->isDirty('parent_id')) {
                    if (!$category->_disableEventUpdateSlug) {
                        self::updateUrlRecurse($category);
                    }
                }
                if ($category->isDirty('published') && $category->published == 0) {
                    if (!$category->_disableEventUpdatePublished) {
                        self::updateDisablePublishedRecurse($category);
                    }
                }
            }
        );
    }

    public static function updateUrlRecurse(self $category)
    {
        $parents = $category->getParents(true, true);
        $slug_arr = [];
        foreach ($parents as $parent) {
            $slug_arr[] = $parent->alias;
        }
        //чтобы событие на обновление не сработало
        $category->_disableEventUpdateSlug = true;
        $category->update(['slug' => implode('/', $slug_arr)]);
        foreach ($category->children()->get() as $child) {
            self::updateUrlRecurse($child);
        }
    }

    public static function updateDisablePublishedRecurse(self $category)
    {
        //чтобы событие на обновление не сработало
        $category->_disableEventUpdatePublished = true;
        $category->update(['published' => 0]);
        foreach ($category->children()->get() as $child) {
            self::updateUrlRecurse($child);
        }
    }

    public function getParents($with_self = false, $reverse = false): array
    {
        $p = $this;
        $parents = [];
        if ($with_self) {
            $parents[] = $p;
        }
        if (!count($this->_parents) && $this->parent_id > 0) {
            $catalogs = self::getCatalogs();
            while ($p && $p->parent_id > 0) {
                $p = @$catalogs[$p->parent_id];
                $this->_parents[] = $p;
            }
        }
        $parents = array_merge($parents, $this->_parents);
        if ($reverse) {
            $parents = array_reverse($parents);
        }

        return $parents;
    }

    public static function getCatalogs()
    {
        $catalogs = Cache::get('catalogs', []);
        if (!$catalogs) {
            $catalog_arr = Category::all(['id', 'parent_id', 'name', 'alias', 'published']);
            foreach ($catalog_arr as $item) {
                $catalogs[$item->id] = $item;
            }
            Cache::add('catalogs', $catalogs, 1);
        }

        return $catalogs;
    }

    public function getBread(): array
    {
        $bread = [];
        $bread[] = [
            'name' => $this->name,
            'url' => $this->url,
        ];
        $category = $this;
        while ($category = $category->parent) {
            $bread[] = [
                'name' => $category->name,
                'url' => $category->url,
            ];
        }

        return array_reverse($bread, true);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function scopePublic($query)
    {
        return $query->where('published', 1);
    }

    public function getUrlAttribute(): ?string
    {
        if ($this->_url) {
            return $this->_url;
        }

        return route('catalog.view', ['alias' => $this->slug]);
    }

    public function getIsActiveAttribute(): bool
    {
        //берем или весь или часть адреса, для родительских страниц
        $url = substr(URL::current(), 0, strlen($this->getUrlAttribute()));

        return $url == $this->getUrlAttribute();
    }

    public static function getTopLevel()
    {
        return self::public()->whereParentId(null)->orderBy('order')->get();
    }

    public static function getByPath($path): ?Category
    {
        if (is_array($path)) {
            $path = implode('/', $path);
        }

        return self::query()->public()->whereSlug($path)->first();
    }

}
