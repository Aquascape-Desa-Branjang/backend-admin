<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\MilestoneResource\Pages;
use App\Models\Milestone;
use App\Support\FilamentBase\Forms\ImageUpload;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MilestoneResource extends Resource
{
    protected static ?string $model = Milestone::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    public static function getNavigationGroup(): ?string
    {
        return 'Content';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Content')
                    ->columns(2)
                    ->schema([
                        ImageUpload::make('image')
                            ->columnSpanFull()
                            ->required(),

                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Select::make('year')
                            ->label('Year')
                            ->searchable()
                            ->options(function () {
                                $currentYear = Carbon::now()->year;
                                $startYear = 2000;

                                return collect(range($currentYear, $startYear))
                                    ->mapWithKeys(fn ($year) => [$year => $year])
                                    ->toArray();
                            })
                            ->required(),

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
            ->defaultSort('year', 'DESC')
            ->columns([
                Tables\Columns\ImageColumn::make('image'),

                Tables\Columns\TextColumn::make('year')
                    ->sortable(),

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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMilestones::route('/'),
            'create' => Pages\CreateMilestone::route('/create'),
            'view' => Pages\ViewMilestone::route('/{record}'),
            'edit' => Pages\EditMilestone::route('/{record}/edit'),
        ];
    }
}
