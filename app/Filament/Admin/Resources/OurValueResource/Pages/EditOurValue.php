<?php

namespace App\Filament\Admin\Resources\OurValueResource\Pages;

use App\Filament\Admin\Resources\OurValueResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOurValue extends EditRecord
{
    protected static string $resource = OurValueResource::class;

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
