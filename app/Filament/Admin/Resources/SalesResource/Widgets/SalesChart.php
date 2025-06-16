<?php

namespace App\Filament\Admin\Resources\SalesResource\Widgets;

use App\Models\Sales;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Carbon;

class SalesChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    public ?string $filter = 'today';

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Hari',
            'week' => 'Minggu',
            'month' => 'Bulan',
            'year' => 'Tahun',
        ];
    }

    protected function getData(): array
    {
        $activeFilter = $this->filter;

        $start = match ($this->filter) {
            'today' => now()->startOfDay(),
            'week' => now()->startOfWeek(),
            'month' => now()->startOfMonth(),
            'year' => now()->startOfYear(),
            default => now()->startOfYear(),
        };

        $end = match ($this->filter) {
            'today' => now()->endOfDay(),
            'week' => now()->endOfWeek(),
            'month' => now()->endOfMonth(),
            'year' => now()->endOfYear(),
            default => now()->endOfYear(),
        };

        $interval = match ($this->filter) {
            'today' => 'perHour',
            'week' => 'perDay',
            'month' => 'perDay',
            'year' => 'perMonth',
            default => 'perMonth',
        };

        $data = Trend::model(Sales::class)
            ->between(start: $start, end: $end)
            ->{$interval}()
            ->sum('revenue');

        return [
            'datasets' => [
                [
                    'label' => 'Transaksi',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate)->toArray(),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => match ($this->filter) {
                'today' => Carbon::parse($value->date)->format('H:i'),
                'week', 'month' => Carbon::parse($value->date)->format('d M'),
                'year' => Carbon::parse($value->date)->format('M'),
                default => Carbon::parse($value->date)->format('Y-m-d'),
            })->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
