<?php

namespace App\Support\FilamentBase\Actions;

use Filament\Tables\Actions\Action;

class CustomHeaderRelationManagerAction
{
    public static function make(string $name, string $icon, string $color, array $data = [], ?string $successMsg = null): Action
    {
        $result = Action::make($name)
            ->label($name)
            ->icon($icon)
            ->color($color)
            ->modalIcon($icon)
            ->modalHeading(fn (Action $action): string => $name)
            ->successNotificationTitle(function () use ($successMsg): string {
                if (empty($successMsg)) {
                    return __('filament-actions::edit.single.notifications.saved.title');
                }

                return $successMsg;
            });

        return $result;
    }
}
