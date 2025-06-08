<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\HeroImageAboutResource\Pages;
use App\Models\Image;
use App\Support\FilamentBase;
use App\Support\FilamentBase\Forms\ImageUpload;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class HeroImageAboutResource extends Resource
{
    protected static ?string $model = Image::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return 'About Hero Image';
    }

    public static function getPluralModelLabel(): string
    {
        return 'About Hero Images';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Content';
    }

    public static function getEloquentQuery(): Builder
    {
        return static::getModel()::query()
            ->where('type', 0);
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

                        Forms\Components\Toggle::make('is_active')
                            ->default(true)
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('order')
            ->defaultSort('order', 'asc')
            ->contentGrid(['md' => 3, 'xl' => 4])
            ->columns([
                Tables\Columns\Layout\Stack::make([
                    Tables\Columns\ImageColumn::make('image')
                        ->height(150)
                        ->width('100%'),
                    Tables\Columns\Layout\Split::make([
                        Tables\Columns\IconColumn::make('is_active')
                            ->boolean(),
                    ]),
                ]),
            ])
            ->filters([
                FilamentBase\Filters\TernaryActiveStatusFilter::make(),
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
            'index' => Pages\ListHeroImageAbouts::route('/'),
            'create' => Pages\CreateHeroImageAbout::route('/create'),
            'view' => Pages\ViewHeroImageAbout::route('/{record}'),
            'edit' => Pages\EditHeroImageAbout::route('/{record}/edit'),
        ];
    }
}
