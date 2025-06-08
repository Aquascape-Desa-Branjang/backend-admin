<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CareerResource\Pages;
use App\Models\Career;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CareerResource extends Resource
{
    protected static ?string $model = Career::class;

    public static int $requirementCount = 1;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?int $navigationSort = 3;

    public static function getModelLabel(): string
    {
        return 'Career';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Careers';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Career';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Content')
                    ->columns(1)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),

                        \FilamentTiptapEditor\TiptapEditor::make('description')
                            ->label('Description')
                            ->columnSpanFull()
                            ->profile('page')
                            ->disk('public')
                            ->directory('uploads')
                            ->acceptedFileTypes(['image/jpg', 'image/jpeg', 'image/png'])
                            ->maxFileSize(2048)
                            ->extraInputAttributes(['style' => 'min-height: 320px;']),

                        Forms\Components\Repeater::make('requirements')
                            ->columnSpanFull()
                            ->collapsible(true)
                            ->collapsed(true)
                            ->itemLabel(fn (): string => 'Requirement '.self::$requirementCount++)
                            ->required()
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->columnSpanFull()
                                    ->required(),
                            ]),

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
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_active')
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
            'index' => Pages\ListCareers::route('/'),
            'create' => Pages\CreateCareer::route('/create'),
            'view' => Pages\ViewCareer::route('/{record}'),
            'edit' => Pages\EditCareer::route('/{record}/edit'),
        ];
    }
}
