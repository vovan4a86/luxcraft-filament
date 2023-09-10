<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('PageSettings.hero_video', '');
        $this->migrator->add('PageSettings.hero_brand', '«ЛюксКрафт» в Екатеринбурге');
        $this->migrator->add('PageSettings.hero_title', 'Гофротара');
        $this->migrator->add('PageSettings.hero_social_yt', 'yt');
        $this->migrator->add('PageSettings.hero_social_vk', 'vk');
    }
};
