<?php

namespace App\Filament\Admin\Resources\EProcurementResource\Pages;

use App\Filament\Admin\Resources\EProcurementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEProcurements extends ListRecords
{
    protected static string $resource = EProcurementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
