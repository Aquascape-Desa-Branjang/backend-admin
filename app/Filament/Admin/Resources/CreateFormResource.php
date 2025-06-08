<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CreateFormResource\Pages;
use App\Models\CreateForm;
use App\Support\FilamentBase;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CreateFormResource extends Resource
{
    protected static ?string $model = CreateForm::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $slug = 'contacts';

    public static function getModelLabel(): string
    {
        return 'Contact';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Contacts';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Content';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Content')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label(__('admin.name'))
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('email')
                        ->label(__('admin.email'))
                        ->email()
                        ->required(),

                    Forms\Components\TextInput::make('phone_number')
                        ->label(__('admin.phone_number'))
                        ->numeric()
                        ->required(),

                    Forms\Components\TextInput::make('subject')
                        ->label(__('admin.subject'))
                        ->required(),

                    Forms\Components\Textarea::make('message')
                        ->label(__('admin.message'))
                        ->columnSpanFull()
                        ->required(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'DESC')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('admin.name'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('email')
                    ->label(__('admin.email'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('phone_number')
                    ->label(__('admin.phone_number'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subject')
                    ->label(__('admin.subject'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('message')
                    ->label(__('admin.message'))
                    ->limit(50)
                    ->sortable()
                    ->wrap(),

                FilamentBase\Columns\CreatedAt::make(),
                FilamentBase\Columns\UpdatedAt::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCreateForms::route('/'),
            'view' => Pages\ViewCreateForm::route('/{record}'),
        ];
    }
}
