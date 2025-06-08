<?php

namespace App\Filament\Admin\Resources\HeroImageAboutResource\Pages;

use App\Filament\Admin\Resources\HeroImageAboutResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHeroImageAbout extends EditRecord
{
    protected static string $resource = HeroImageAboutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('back')
                ->label('Back to Table')
                ->url($this->getResource()::getUrl())
                ->color('gray'),
            Actions\ViewAction::make()
                ->color('primary'),
        ];
    }
}
