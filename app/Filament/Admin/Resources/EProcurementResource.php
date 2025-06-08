<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\EProcurementResource\Pages;
use App\Models\EProcurement;
use App\Support\FilamentBase;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class EProcurementResource extends Resource
{
    protected static ?string $model = EProcurement::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';

    public static function getModelLabel(): string
    {
        return 'E-Procurement';
    }

    public static function getPluralModelLabel(): string
    {
        return 'E-Procurements';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'E-Procurement';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Content')
                    ->columns(2)
                    ->schema([
                        FilamentBase\Forms\CustomFileUpload::make('attachment', 'File', 'pdf')
                            ->columnSpanFull()
                            ->required(),

                        Forms\Components\TextInput::make('number')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\DatePicker::make('announcement_date')
                            ->required(),

                        Forms\Components\DatePicker::make('closing_date')
                            ->required()
                            ->after(fn ($get) => $get('announcement_date')),

                        Forms\Components\TextInput::make('working_unit')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('ceiling_budget')
                            ->prefix('Rp.')
                            ->required()
                            ->default(0)
                            ->minValue(0)
                            ->mask(RawJs::make('$money($input, \',\', \'.\')'))
                            ->stripCharacters([',', '.', ' '])
                            ->numeric(),

                        Forms\Components\TextInput::make('procurement_method')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('evaluation_method')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('winning_vendor')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('url')
                            ->required()
                            ->url()
                            ->maxLength(255),

                        Forms\Components\Select::make('status')
                            ->options([
                                true => 'Open',
                                false => 'Close',
                            ])
                            ->required(),

                        Forms\Components\Toggle::make('is_active')
                            ->default(true)
                            ->inline(false)
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('number')
                    ->searchable(),

                Tables\Columns\TextColumn::make('name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('announcement_date')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('closing_date')
                    ->date()
                    ->sortable(),

                Tables\Columns\IconColumn::make('status')
                    ->boolean(),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
            ])
            ->filters([
                \App\Support\FilamentBase\Filters\TernaryActiveStatusFilter::make(),
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        true => 'Open',
                        false => 'Close',
                    ]),
                Filter::make('date')
                    ->form([
                        Forms\Components\DatePicker::make('announcement_date'),
                        Forms\Components\DatePicker::make('closing_date'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['announcement_date'],
                                fn (Builder $query, $date): Builder => $query->whereDate('announcement_date', '>=', $date),
                            )
                            ->when(
                                $data['closing_date'],
                                fn (Builder $query, $date): Builder => $query->whereDate('closing_date', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListEProcurements::route('/'),
            'create' => Pages\CreateEProcurement::route('/create'),
            'view' => Pages\ViewEProcurement::route('/{record}'),
            'edit' => Pages\EditEProcurement::route('/{record}/edit'),
        ];
    }
}
