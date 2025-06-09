<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProductResource\Pages;
use App\Filament\Admin\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                TextInput::make('name')
                ->required()
                ->maxLength(255),

                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),

                TagsInput::make('product_category_ids')
                    ->label('Category IDs'),

                FileUpload::make('images')
                    ->multiple()
                    ->required()
                    ->image(),

                TiptapEditor::make('description')
                    ->required(),

                TextInput::make('retail_price')
                    ->numeric()
                    ->prefix('Rp')
                    ->suffix('.00'),

                Repeater::make('wholesale_prices')
                    ->schema([
                        TextInput::make('min_qty')->numeric()->required(),
                        TextInput::make('price')->numeric()->required()->prefix('Rp'),
                    ])
                    ->label('Wholesale Prices'),

                TextInput::make('shopee_link')
                    ->label('Shopee Link')
                    ->url()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('product_category_ids'),
                TextColumn::make('retail_price')->money('IDR'),
                TextColumn::make('slug'),
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
