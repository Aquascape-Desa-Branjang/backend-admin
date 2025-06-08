<?php

namespace App\Support\FilamentBase\Columns;

use Filament\Tables\Columns\IconColumn;

class CustomBooleanIcon
{
    public static function make(
        string $name, ?string $customLabel = null,
        string $trueColor = 'primary', string $falseColor = 'danger'): IconColumn
    {
        return IconColumn::make($name)
            ->label($customLabel ?: $name)
            ->boolean()
            ->trueColor($trueColor)
            ->falseColor($falseColor)
            ->sortable()
            ->extraHeaderAttributes(['style' => 'width:48px']);
    }
}
