<?php

namespace App\Filament\Admin\Resources\EProcurementResource\Pages;

use App\Filament\Admin\Resources\EProcurementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEProcurement extends EditRecord
{
    protected static string $resource = EProcurementResource::class;

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
