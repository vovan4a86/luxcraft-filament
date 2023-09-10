<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Category;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Товары';
    protected static ?string $modelLabel = 'Товар';
    protected static ?string $pluralModelLabel = 'Товары';
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
                                    ->unique(Product::class, 'alias', ignoreRecord: true),

                                Forms\Components\Select::make('category_id')
                                    ->required()
                                    ->label('Категория')
                                    ->relationship('category', 'name')
                                    ->placeholder('Категория товара'),

                                Forms\Components\TextInput::make('price')
                                    ->label('Цена, руб (точка - разделитель)'),

                                Forms\Components\RichEditor::make('text')
                                    ->label('Текст')
                                    ->placeholder('Текст страницы')
                                    ->columnSpanFull(),

                                Fieldset::make('Отображение')
                                    ->schema([
                                        Forms\Components\Toggle::make('published')
                                            ->label('Показывать')
                                            ->default(true),
                                        Forms\Components\Toggle::make('in_stock')
                                            ->label('Наличие')
                                        ->default(true),
                                    ]),
                            ]),
                        Forms\Components\Tabs\Tab::make('Внутренние размеры')
                            ->schema([
                                Forms\Components\TextInput::make('inner_length')
                                    ->label('Длина мм')
                                    ->numeric()
                                    ->minValue(0),
                                Forms\Components\TextInput::make('inner_wide')
                                    ->label('Ширина, мм')
                                    ->numeric()
                                    ->minValue(0),
                                Forms\Components\TextInput::make('inner_height')
                                    ->label('Высота, мм')
                                    ->numeric()
                                    ->minValue(0),
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
                            ->multiple()
                            ->label('Изображение')
                            ->disk('public')
                            ->directory('product/images'),

                        Fieldset::make('Дата')
                            ->schema([
                                Forms\Components\Placeholder::make('created_at')
                                    ->label('Создано')
                                    ->content(fn(Product $record): ?string => $record->created_at?->diffForHumans()),

                                Forms\Components\Placeholder::make('updated_at')
                                    ->label('Изменено')
                                    ->content(fn(Product $record): ?string => $record->updated_at?->diffForHumans()),
                            ])->columnSpanFull()
                            ->hidden(fn(?Product $record) => $record === null),
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
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Категория')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('published')
                    ->label('Показывать')
                    ->sortable(),
                Tables\Columns\BooleanColumn::make('in_stock')
                    ->label('В наличии'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
