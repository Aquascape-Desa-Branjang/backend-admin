<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SalesResource\Pages;
use App\Filament\Admin\Resources\SalesResource\Widgets\SalesChart;
use App\Models\Product;
use App\Models\Sales;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SalesResource extends Resource
{
    protected static ?string $model = Sales::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    public static function getModelLabel(): string
    {
        return 'keuangan';
    }

    public static function getPluralModelLabel(): string
    {
        return 'keuangan';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'keuangan';
    }

    protected static function calculateRevenue(callable $get): ?int
    {
        $product = Product::find($get('product_id'));
        $stock = $get('stock');

        if ($product && is_numeric($stock)) {
            return (int) ($product->retail_price * $stock);
        }

        return null;
    }

    public static function getWidgets(): array
    {
        return [
            SalesChart::class,
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('product_id')
                    ->label('Produk')
                    ->relationship('product', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->reactive(),

                TextInput::make('stock')
                    ->label('Stok')
                    ->numeric()
                    ->minValue(1)
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                        $set('revenue', static::calculateRevenue($get));
                    }),

                DateTimePicker::make('created_at')
                    ->label('tanggal')
                    ->timezone('Asia/Jakarta')
                    ->displayFormat('d/m/Y H:i')
                    ->required()
                    ->default(now()->setTimezone('Asia/Jakarta')),

                Placeholder::make('harga_satuan')
                    ->label('Harga Satuan')
                    ->reactive()
                    ->content(function ($get) {
                        $product = Product::find($get('product_id'));

                        return $product
                            ? 'Rp '.number_format($product->retail_price, 0, ',', '.')
                            : '-';
                    }),

                Placeholder::make('revenue_display')
                    ->label('Perkiraan Pendapatan')
                    ->reactive()
                    ->content(function ($get) {
                        $product = Product::find($get('product_id'));
                        $stock = $get('stock');

                        if ($product && is_numeric($stock)) {
                            return 'Rp '.number_format($product->retail_price * $stock, 0, ',', '.');
                        }

                        return '-';
                    }),

                Hidden::make('revenue')
                    ->dehydrated()
                    ->default(fn ($get) => static::calculateRevenue($get)),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('created_at')
                    ->label('waktu')
                    ->dateTime('d/m/Y H:i')
                    ->timezone('Asia/Jakarta')
                    ->sortable(),
                ImageColumn::make('product.image')
                    ->label('gambar')
                    ->height(75)
                    ->width('100%')
                    ->circular(),
                TextColumn::make('product.name')
                    ->label('nama')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('product.productCategories.name')
                    ->label('Kategori')
                    ->formatStateUsing(fn ($state) => collect($state)->join(', '))
                    ->searchable(),
                TextColumn::make('product.retail_price')
                    ->label('harga')
                    ->formatStateUsing(fn ($state) => 'Rp '.number_format($state, 0, ',', '.'))
                    ->sortable(),
                TextColumn::make('stock')
                    ->label('stok')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('revenue')
                    ->label('pendapatan')
                    ->formatStateUsing(fn ($state) => 'Rp '.number_format($state, 0, ',', '.'))
                    ->sortable(),
            ])
            ->filters([
                // Filter by date range
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('from')
                            ->label('Dari'),
                        Forms\Components\DatePicker::make('until')
                            ->label('Sampai'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['from'], fn ($q) => $q->whereDate('created_at', '>=', $data['from']))
                            ->when($data['until'], fn ($q) => $q->whereDate('created_at', '<=', $data['until']));
                    }),

                // Filter by product category
                Tables\Filters\SelectFilter::make('category')
                    ->label('Kategori Produk')
                    ->options(fn () => \App\Models\ProductCategory::query()
                        ->orderBy('name')
                        ->pluck('name', 'id')
                        ->toArray()
                    )
                    ->searchable()
                    ->multiple()
                    ->query(function (Builder $query, array $data): Builder {
                        if (! isset($data['values']) || empty($data['values'])) {
                            return $query;
                        }

                        return $query->whereHas('product.productCategories', function ($q) use ($data) {
                            $q->whereIn('id', $data['values']);
                        });
                    }),
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
            'index' => Pages\ListSales::route('/'),
            'create' => Pages\CreateSales::route('/create'),
            'edit' => Pages\EditSales::route('/{record}/edit'),
        ];
    }
}
