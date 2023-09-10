<?php

namespace App\Models;

use App\Traits\HasH1;
use App\Traits\HasSeo;
use App\Traits\OgGenerate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use SolutionForest\FilamentTree\Concern\ModelTree;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @property string $alias
 * @property int $parent_id
 * @property mixed $children
 * @method static Builder whereAlias(string $alias)
 * @method static Builder whereParentId(int $id)
 */
class Page extends Model implements HasMedia
{
    use HasH1, HasSeo, OgGenerate, ModelTree, InteractsWithMedia;

    protected $fillable = ['name', 'parent_id', 'h1', 'alias', 'slug',
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
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CONTAIN, 300, 300)
            ->nonQueued();
    }

    public function determineTitleColumnName(): string
    {
        return 'name';
    }

    public static function boot()
    {
        parent::boot();

        self::saved(function (self $page) {
            if ($page->isDirty('alias') || $page->isDirty('parent_id')) {
                if (!$page->_disableEventUpdateSlug) {
                    self::updateUrlRecurse($page);
                }
            }
            if ($page->isDirty('published') && $page->published == 0) {
                if (!$page->_disableEventUpdatePublished) {
                    self::updateDisablePublishedRecurse($page);
                }
            }
        });
    }

    public static function updateUrlRecurse(self $page)
    {
        $parents = $page->getParents(true, true);
        $slug_arr = [];
        foreach ($parents as $parent) {
            $slug_arr[] = $parent->alias;
        }
        //чтобы событие на обновление не сработало
        $page->_disableEventUpdateSlug = true;
        $page->update(['slug' => implode('/', $slug_arr)]);
        foreach ($page->children as $child) {
            self::updateUrlRecurse($child);
        }
    }

    public static function updateDisablePublishedRecurse(self $page)
    {
        //чтобы событие на обновление не сработало
        $page->_disableEventUpdatePublished = true;
        $page->update(['published' => 0]);
        foreach ($page->children as $child) {
            self::updateUrlRecurse($child);
        }
    }

    public function children(): HasMany
    {
        return $this->hasMany(Page::class, 'parent_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

    public function scopePublic($query)
    {
        return $query->where('published', 1);
    }

    public function getBread(): array
    {
        $bread = [];

        foreach ($this->getParents(true) as $p) {
            $bread[] = [
                'url'  => $p->url,
                'name' => $p->name
            ];
        }

        return array_reverse($bread);
    }

    public static function getByPath($path, $id = 1)
    {
        $parent_id = $id;
        $page = null;

        foreach ($path as $alias) {
            $page = Page::whereAlias($alias)
                ->whereParentId($parent_id)
                ->public()
                ->get(['id', 'alias', 'parent_id'])
                ->first();
            if ($page === null) {
                return null;
            }
            $parent_id = $page->id;
        }

        if ($page && $page->id > 0) {
            return Page::query()->find($page->id);
        } else {
            return null;
        }
    }

    public static function getPages($id = null)
    {
        $pages = Cache::get('pages', []);
        if (!$pages) {
            $pages_arr = Page::all(['id', 'name', 'alias', 'published', 'parent_id']);
            foreach ($pages_arr as $item) {
                $pages[$item->id] = $item;
            }
            Cache::add('pages', $pages, 1);
        }
        if ($id) {
            return (isset($pages[$id])) ? $pages[$id] : null;
        } else {
            return $pages;
        }
    }

    public function getParents($with_self = false, $reverse = false): array
    {
        $p = $this;
        $parents = [];
        if ($with_self) {
            $parents[] = $p;
        }
        if (!count($this->_parents) && $this->parent_id > 1) {
            while ($p && $p->parent_id > 1) {
                $p = self::getPages(
                    $p->parent_id
                ); // Page::find($p->parent_id, ['id','parent_id','name','alias','published']);
                $this->_parents[] = $p;
            }
        }
        $parents = array_merge($parents, $this->_parents);
        if ($reverse) {
            $parents = array_reverse($parents);
        }

        return $parents;
    }

    public function getUrlAttribute(): string
    {
        if ($this->_url) {
            return $this->_url;
        }

        $path = [$this->alias];
        if (!count($this->_parents)) {
            $this->getParents();
        }
        foreach ($this->_parents as $parent) {
            $path[] = $parent->alias;
        }

        $path = implode('/', array_reverse($path));

        if ($path) {
            $this->_url = route('default', ['alias' => $path]);
        } else {
            $this->_url = route('main');
        }

        return $this->_url;
    }

    public function getImageSrcAttribute(): string
    {
        $media = $this->getMedia();
        return $media[0]->getUrl('admin_thumb');
    }

    public function getView(): string
    {
        $view = 'pages.text';
        if (view()->exists('pages.unique.' . $this->alias)) {
            $view = 'pages.unique.' . $this->alias;
        }

        return $view;
    }

}
