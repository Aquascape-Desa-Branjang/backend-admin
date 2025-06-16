<?php

namespace App\Filament\Admin\Resources\SalesResource\Pages;

use App\Filament\Admin\Resources\SalesResource;
use App\Filament\Admin\Resources\SalesResource\Widgets\SalesChart;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSales extends ListRecords
{
    protected static string $resource = SalesResource::class;

    protected function getFooterWidgets(): array
    {
        return [
            SalesChart::class,
        ];
    }

    public function getFooterWidgetsColumns(): int|array
    {
        return 1;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
