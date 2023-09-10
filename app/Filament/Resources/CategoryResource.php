<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Категории';
    protected static ?string $modelLabel = 'Категория';
    protected static ?string $pluralModelLabel = 'Категории';
    protected static ?string $navigationGroup = 'Каталог';
    protected static ?int $navigationSort = 1;

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
                                    ->unique(Category::class, 'alias', ignoreRecord: true),

                                Forms\Components\Select::make('parent_id')
                                    ->label('Родительская категория')
                                    ->relationship('parent', 'name')
                                    ->placeholder('Выбрать'),

                                Forms\Components\RichEditor::make('announce')
                                    ->label('Анонс')
                                    ->placeholder('Анонс страницы')
                                    ->columnSpanFull(),

                                Forms\Components\RichEditor::make('text')
                                    ->label('Текст')
                                    ->placeholder('Текст страницы')
                                    ->columnSpanFull(),

                                Fieldset::make('Отображение')
                                    ->schema([
                                        Forms\Components\Toggle::make('published')
                                            ->label('Показывать')
                                            ->default(true),
                                        Forms\Components\Toggle::make('on_main')
                                            ->label('На главной'),
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
                            ->directory('categories/images'),

                        Fieldset::make('Дата')
                            ->schema([
                                Forms\Components\Placeholder::make('created_at')
                                    ->label('Создано')
                                    ->content(fn(Category $record): ?string => $record->created_at?->diffForHumans()),

                                Forms\Components\Placeholder::make('updated_at')
                                    ->label('Изменено')
                                    ->content(fn(Category $record): ?string => $record->updated_at?->diffForHumans()),
                            ])->columnSpanFull()
                            ->hidden(fn(?Category $record) => $record === null),
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
                Tables\Columns\TextColumn::make('parent.name')
                    ->label('Родитель')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('published')
                    ->label('Показывать')
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('on_main')
                    ->label('На главной')
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
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
            'tree-list' => Pages\CategoryTree::route('/tree-list'),
        ];
    }
}
