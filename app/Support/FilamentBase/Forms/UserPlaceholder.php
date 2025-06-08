<?php

namespace App\Support\FilamentBase\Forms;

use Filament\Forms;
use Filament\Forms\Components\Section;

class UserPlaceholder
{
    public static function make(?string $title = null): Section
    {
        return Section::make($title)
            ->columns(3)
            ->collapsible()
            ->visibleOn(['view'])
            ->schema([
                Forms\Components\FileUpload::make('avatar')
                    ->label(__('admin.profile_picture'))
                    ->alignCenter()
                    ->image()
                    ->avatar()
                    ->hiddenLabel()
                    ->deletable(false)
                    ->afterStateHydrated(fn ($set, $record): array => $set('avatar',
                        (array) @$record->creator?->avatar_path ?: ['static/ava-dummy.png'])),
                Forms\Components\Placeholder::make(__('admin.name'))
                    ->content(fn ($record): string => @$record->creator?->name),
                Forms\Components\Placeholder::make(__('admin.email'))
                    ->content(fn ($record): string => @$record->creator?->email),
            ]);
    }
}
