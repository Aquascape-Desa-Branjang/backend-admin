<?php

namespace App\Filament\Admin\Resources\MilestoneResource\Pages;

use App\Filament\Admin\Resources\MilestoneResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMilestone extends ViewRecord
{
    protected static string $resource = MilestoneResource::class;

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
