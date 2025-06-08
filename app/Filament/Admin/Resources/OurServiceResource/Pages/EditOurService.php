<?php

namespace App\Filament\Admin\Resources\OurServiceResource\Pages;

use App\Filament\Admin\Resources\OurServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOurService extends EditRecord
{
    protected static string $resource = OurServiceResource::class;

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
