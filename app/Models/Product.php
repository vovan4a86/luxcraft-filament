<?php

namespace App\Models;

use App\Traits\HasH1;
use App\Traits\HasSeo;
use App\Traits\OgGenerate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @property string sizes
 * @property mixed category
 */
class Product extends Model implements HasMedia
{
    use HasH1, HasSeo, OgGenerate, InteractsWithMedia;

    protected $casts = [
        'chars' => 'json'
    ];

    protected $guarded = ['id'];
    private string $_url = '';

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('admin_thumb')
            ->fit(Manipulations::FIT_CONTAIN, 100, 100)
            ->nonQueued();
        $this
            ->addMediaConversion('slider_small')
            ->fit(Manipulations::FIT_CONTAIN, 135, 90)
            ->nonQueued();
        $this
            ->addMediaConversion('slider_wide')
            ->fit(Manipulations::FIT_CONTAIN, 616, 453)
            ->nonQueued();
        $this
            ->addMediaConversion('card')
            ->fit(Manipulations::FIT_CONTAIN, 276, 210)
            ->nonQueued();
    }

//    public function save(array $options = [])
//    {
//        if (!$this->article) {
//            $max = Product::max('id') + 1;
//            $this->article = $this->makeArticle($max);
//            $this->save();
//        }
//
//        return parent::save($options);
//    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function scopePublic($query)
    {
        return $query->where('published', 1);
    }

    public function getBread() {
        $bread = $this->category->getBread();
        $bread[] = [
            'url' => $this->url,
            'name' => $this->name
        ];

        return $bread;
    }

    public function getUrlAttribute()
    {
        if (!$this->_url) {
            $this->_url = $this->category->url . '/' . $this->alias;
        }
        return $this->_url;
    }

    public function getImageSrcAttribute() {
        return $this->image ? Storage::url($this->image) : null;
    }

    public function makeArticle($max): string {
        return str_pad($max, 6, '0', STR_PAD_LEFT);
    }

}
