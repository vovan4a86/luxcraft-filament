<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class IndexPageSettings extends Settings
{
    public ?string $hero_video = null;
    public ?string $hero_brand = null;
    public ?string $hero_title = null;
    public ?string $hero_social_yt = null;
    public ?string $hero_social_vk = null;


    public static function group(): string
    {
        return 'PageSettings';
    }
}
