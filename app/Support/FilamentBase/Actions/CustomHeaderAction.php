<?php

namespace App\Support\FilamentBase\Actions;

use Filament\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Model;

class CustomHeaderAction
{
    public static function make(string $name, string $icon, string $color, array $data = [], ?string $successMsg = null): DeleteAction
    {
        return DeleteAction::make($name)
            ->label($name)
            ->icon($icon)
            ->color($color)
            ->modalIcon($icon)
            ->modalHeading(fn (DeleteAction $action): string => $name.' '.$action->getRecordTitle())
            ->successNotificationTitle(function () use ($successMsg): string {
                if (empty($successMsg)) {
                    return __('filament-actions::edit.single.notifications.saved.title');
                }

                return $successMsg;
            })
            ->action(function (DeleteAction $action) use ($data): void {
                $result = $action->process(static fn (Model $record): bool => $record->update($data));

                if (! $result) {
                    $action->failure();

                    return;
                }

                $action->success();
            });
    }
}
