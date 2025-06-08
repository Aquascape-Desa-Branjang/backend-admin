<?php

namespace App\Support\FilamentBase\Forms;

use Filament\Forms\Components\FileUpload;

class ImageUpload
{
    public static function make(string $column): FileUpload
    {
        return FileUpload::make($column)
            ->image()
            ->imageEditor()
            ->imagePreviewHeight('256px')
            ->directory('uploads')
            ->getUploadedFileNameForStorageUsing( //
                fn ($file) => uniqid().$file->hashName()
            )
            ->downloadable()
            ->openable();
    }
}
