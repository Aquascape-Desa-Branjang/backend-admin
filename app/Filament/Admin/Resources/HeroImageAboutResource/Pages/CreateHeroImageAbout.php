<?php

namespace App\Filament\Admin\Resources\HeroImageAboutResource\Pages;

use App\Filament\Admin\Resources\HeroImageAboutResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHeroImageAbout extends CreateRecord
{
    protected static string $resource = HeroImageAboutResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // 0 for abou hero image
        $data['type'] = 0;

        return $data;
    }
}
