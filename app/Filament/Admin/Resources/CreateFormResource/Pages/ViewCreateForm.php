<?php

namespace App\Filament\Admin\Resources\CreateFormResource\Pages;

use App\Filament\Admin\Resources\CreateFormResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;

class ViewCreateForm extends ViewRecord
{
    protected static string $resource = CreateFormResource::class;

    protected function getActions(): array
    {
        return [
            Action::make('back')
                ->label('Back to Table')
                ->url($this->getResource()::getUrl())
                ->color('gray'),
        ];
    }
}
