<?php

namespace App\Filament\Admin\Resources\EProcurementResource\Pages;

use App\Filament\Admin\Resources\EProcurementResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEProcurement extends ViewRecord
{
    protected static string $resource = EProcurementResource::class;

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
