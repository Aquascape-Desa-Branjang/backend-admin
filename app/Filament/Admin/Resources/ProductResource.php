<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProductResource\Pages;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Support\FilamentBase;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return 'Produk';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Produk';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Produk';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FilamentBase\Forms\CustomFileUpload::make('image', 'image', 'image')
                    ->required()
                    ->label('Gambar Produk')
                    ->maxSize(2048)
                    ->columnSpanFull()
                    ->helperText('Rasio 1:1, Ukuran maksimal 2mb"'),

                Select::make('product_category_ids')
                    ->label('Kategori Produk')
                    ->columnSpanFull()
                    ->options(function () {
                        return ProductCategory::pluck('name', 'id')->toArray();
                    })
                    ->searchable()
                    ->multiple(),

                TextInput::make('name')
                    ->label('Nama Produk')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, $set) => $set('slug', str($state)->slug()))
                    ->maxLength(255),

                TextInput::make('slug')
                    ->label('Slug (URL Produk)')
                    ->required()
                    ->maxLength(255)
                    ->formatStateUsing(fn ($state) => str($state)->slug())
                    ->dehydrateStateUsing(fn ($state) => str($state)->slug())
                    ->unique(ignoreRecord: true)
                    ->helperText('Slug unik, misalnya "elektronik-pribadi"'),

                \FilamentTiptapEditor\TiptapEditor::make('description')
                    ->label('Deskripsi Produk')
                    ->columnSpanFull()
                    ->profile('page')
                    ->required()
                    ->disk('public')
                    ->directory('uploads')
                    ->acceptedFileTypes(['image/jpg', 'image/jpeg', 'image/png'])
                    ->maxFileSize(2048)
                    ->extraInputAttributes(['style' => 'min-height: 320px;']),

                TextInput::make('retail_price')
                    ->label('Harga Eceran')
                    ->prefix('Rp.')
                    ->default(0)
                    ->minValue(0)
                    ->mask(RawJs::make('$money($input, \',\', \'.\')'))
                    ->stripCharacters([',', '.', ' '])
                    ->numeric(),

                TextInput::make('shopee_link')
                    ->label('Link Shopee')
                    ->placeholder('https://shopee.co.id/produk-anda')
                    ->url()
                    ->maxLength(255),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->height(75)
                    ->width('100%'),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('created_at')->dateTime('d M Y H:i')->label('Dibuat')->sortable(),
            ])
            ->defaultSort('created_at', 'desc')

            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
