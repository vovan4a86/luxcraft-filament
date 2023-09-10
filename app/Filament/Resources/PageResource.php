<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Страницы';
    protected static ?string $modelLabel = 'Страница';
    protected static ?string $pluralModelLabel = 'Страницы';
    protected static ?string $navigationGroup = 'Структура сайта';
    protected static ?int $navigationSort = 0;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Параметры')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Основные')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Название')
                                    ->required()
                                    ->lazy()
                                    ->afterStateUpdated(
                                        fn(
                                            string $context,
                                            $state,
                                            callable $set
                                        ) => $context === 'create' ? $set(
                                            'alias',
                                            Str::slug($state)
                                        ) : null
                                    ),

                                Forms\Components\TextInput::make('h1')
                                    ->label('H1'),

                                Forms\Components\TextInput::make('alias')
                                    ->label('Alias')
                                    ->required()
                                    ->unique(Page::class, 'alias', ignoreRecord: true),

                                Forms\Components\Select::make('parent_id')
                                    ->label('Родительская категория')
                                    ->relationship('parent', 'name')
                                    ->searchable()
                                    ->placeholder('Выбрать'),

                                Forms\Components\RichEditor::make('text')
                                    ->label('Текст')
                                    ->placeholder('Текст страницы')
                                    ->columnSpanFull(),

                                Fieldset::make('Отображение')
                                    ->schema([
                                        Forms\Components\Toggle::make('published')
                                            ->label('Показывать')
                                            ->default(true),
                                        Forms\Components\Toggle::make('on_header')
                                            ->label('В шапке'),
                                        Forms\Components\Toggle::make('on_footer')
                                            ->label('В подвале'),
                                    ]),
                            ]),
                        Forms\Components\Tabs\Tab::make('SEO')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label('Seo title'),
                                Forms\Components\TextInput::make('keywords')
                                    ->label('Seo keywords'),
                                Forms\Components\Textarea::make('description')
                                    ->label('Seo description'),
                            ])
                    ])->columnSpan(2),

                Section::make('Дополнительно')
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('image')
                            ->label('Изображение')
                            ->disk('public')
                            ->directory('pages/images'),

                        Fieldset::make('Дата')
                            ->schema([
                                Forms\Components\Placeholder::make('created_at')
                                    ->label('Создано')
                                    ->content(fn(Page $record): ?string => $record->created_at?->diffForHumans()),

                                Forms\Components\Placeholder::make('updated_at')
                                    ->label('Изменено')
                                    ->content(fn(Page $record): ?string => $record->updated_at?->diffForHumans()),
                            ])->columnSpanFull()
                            ->hidden(fn(?Page $record) => $record === null),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('image')
                    ->conversion('admin_thumb'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Название')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('h1')
                    ->label('H1')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('parent.name')
                    ->label('Родитель')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('published')
                    ->label('Показывать')
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('on_header')
                    ->label('В шапке')
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('on_footer')
                    ->label('В футере')
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Обновлено')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->action(function () {
                        Notification::make()
                            ->title('Now, now, don\'t be cheeky, leave some records for others to play with!')
                            ->warning()
                            ->send();
                    }),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
            'tree-list' => Pages\PageTree::route('/tree-list'),
        ];
    }
}
