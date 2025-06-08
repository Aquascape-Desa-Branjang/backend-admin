<?php

namespace App\Filament\Admin\Resources\OurServiceResource\Pages;

use App\Filament\Admin\Resources\OurServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewOurService extends ViewRecord
{
    protected static string $resource = OurServiceResource::class;

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
