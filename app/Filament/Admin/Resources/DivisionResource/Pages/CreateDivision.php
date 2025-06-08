<?php

namespace App\Filament\Admin\Resources\DivisionResource\Pages;

use App\Filament\Admin\Resources\DivisionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDivision extends CreateRecord
{
    protected static string $resource = DivisionResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // 1 for Division
        $data['type'] = 1;

        return $data;
    }
}
