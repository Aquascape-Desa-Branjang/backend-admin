<?php

namespace App\Support\FilamentBase\Actions;

use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;

class CustomBulkAction
{
    public static function make(string $name, string $icon, string $color, array $data = [], ?string $successMsg = null): mixed
    {
        return BulkAction::make($name)
            ->label($name)
            ->icon($icon)
            ->color($color)
            ->modalIcon($icon)
            ->requiresConfirmation()
            ->successNotificationTitle(function () use ($successMsg): string {
                if (empty($successMsg)) {
                    return __('filament-actions::edit.single.notifications.saved.title');
                }

                return $successMsg;
            })
            ->action(function (BulkAction $action, Collection $records) use ($data) {
                $result = $records->each->update($data);

                if (! $result) {
                    $action->failure();

                    return;
                }

                $action->success();

            })
            ->deselectRecordsAfterCompletion();
    }
}
