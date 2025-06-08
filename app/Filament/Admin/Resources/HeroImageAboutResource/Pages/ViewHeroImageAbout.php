<?php

namespace App\Filament\Admin\Resources\HeroImageAboutResource\Pages;

use App\Filament\Admin\Resources\HeroImageAboutResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewHeroImageAbout extends ViewRecord
{
    protected static string $resource = HeroImageAboutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('back')
                ->label('Back to Table')
                ->url($this->getResource()::getUrl())
                ->color('gray'),
            Actions\EditAction::make(),
        ];
    }
}
