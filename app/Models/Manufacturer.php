<?php

namespace App\Models;

use App\Traits\HasH1;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Manufacturer extends Model
{
    use HasH1;

    private string $_url = '';
    protected $guarded = ['id'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function scopePublic($query)
    {
        return $query->where('published', 1);
    }

    public function getBread() {
        $bread[] = [
            'url' => $this->url,
            'name' => $this->name
        ];

        return $bread;
    }

    public function getUrlAttribute()
    {
        return route('catalog.manufacturer', $this->alias);
    }

}
