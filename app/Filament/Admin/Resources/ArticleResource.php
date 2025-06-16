<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ArticleResource\Pages;
use App\Filament\Admin\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
Use App\Support\FilamentBase;
use Filament\Forms\Components\TextInput;
use Filament\Support\RawJs;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return 'Artikel';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Artikel';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Artikel';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Content')
                    ->columns(2)
                    ->schema([
                        FilamentBase\Forms\CustomFileUpload::make('image', 'Cover', 'image')
                            ->columnSpanFull()
                            ->required(),

                        TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, $set) => $set('slug', str($state)->slug()))
                            ->maxLength(255),

                        TextInput::make('slug')
                            ->label('Slug (URL artikel)')
                            ->required()
                            ->maxLength(255)
                            ->formatStateUsing(fn ($state) => str($state)->slug())
                            ->dehydrateStateUsing(fn ($state) => str($state)->slug())
                            ->unique(ignoreRecord: true)
                            ->helperText('Nim masing masing. misalnya "24060122120012"'),

                        \FilamentTiptapEditor\TiptapEditor::make('description')
                            ->label('Deskripsi')
                            ->columnSpanFull()
                            ->profile('page')
                            ->required()
                            ->disk('public')
                            ->directory('uploads')
                            ->acceptedFileTypes(['image/jpg', 'image/jpeg', 'image/png'])
                            ->maxFileSize(2048)
                            ->extraInputAttributes(['style' => 'min-height: 320px;']),

                    ])
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
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'view' => Pages\ViewArticle::route('/{record}'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
