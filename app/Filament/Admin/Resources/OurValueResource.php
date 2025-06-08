<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\OurValueResource\Pages;
use App\Models\OurValue;
use App\Support\FilamentBase\Forms\ImageUpload;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OurValueResource extends Resource
{
    protected static ?string $model = OurValue::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift';

    public static function getNavigationGroup(): ?string
    {
        return 'Content';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Content')
                    ->columns(1)
                    ->schema([
                        ImageUpload::make('image')
                            ->columnSpanFull()
                            ->required(),

                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\Toggle::make('is_active')
                            ->default(true)
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('updated_at', 'DESC')
            ->columns([
                Tables\Columns\ImageColumn::make('image'),

                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->sortable()
                    ->boolean(),
            ])
            ->filters([
                \App\Support\FilamentBase\Filters\TernaryActiveStatusFilter::make(),
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
            'index' => Pages\ListOurValues::route('/'),
            'create' => Pages\CreateOurValue::route('/create'),
            'view' => Pages\ViewOurValue::route('/{record}'),
            'edit' => Pages\EditOurValue::route('/{record}/edit'),
        ];
    }
}
