<?php

namespace App\Filament\Pages;

use App\Settings\IndexPageSettings;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageIndexPageSettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Настройки: Главная';
    protected static ?string $navigationGroup = 'Структура сайта';
    protected static ?int $navigationSort = 1;



    protected static string $settings = IndexPageSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Секции')->tabs([
                    Forms\Components\Tabs\Tab::make('Первый экран')->schema([
                        Forms\Components\FileUpload::make('hero_video')
                            ->disk('public')
                            ->directory('pages/video')
                            ->preserveFilenames()
                            ->acceptedFileTypes(['video/mp4', 'video/mpeg'])
                            ->label('Видео'),
                        Forms\Components\TextInput::make('hero_brand')
                            ->label('Бренд'),
                        Forms\Components\TextInput::make('hero_title')
                            ->label('Заголовок'),
                        Fieldset::make('Соц.сети')
                            ->schema([
                                Forms\Components\TextInput::make('hero_social_yt')
                                    ->label('YouTube')
                                    ->prefix('https://'),
                                Forms\Components\TextInput::make('hero_social_vk')
                                    ->label('ВКонтакте')
                                    ->prefix('https://'),
                            ]),
                    ]),
                    Forms\Components\Tabs\Tab::make('Второй экран')->schema([
                    ]),
                ]),
            ])->columns(1);
    }
}
