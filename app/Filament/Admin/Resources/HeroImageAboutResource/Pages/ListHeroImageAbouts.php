<?php

namespace App\Filament\Admin\Resources\HeroImageAboutResource\Pages;

use App\Filament\Admin\Resources\HeroImageAboutResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHeroImageAbouts extends ListRecords
{
    protected static string $resource = HeroImageAboutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
