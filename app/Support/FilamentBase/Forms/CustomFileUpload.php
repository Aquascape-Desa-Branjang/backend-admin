<?php

namespace App\Support\FilamentBase\Forms;

use Filament\Forms\Components\FileUpload;

class CustomFileUpload
{
    /**
     * @param  null|string  $typeFile  Supported types: image|video|audio|pdf|word|excel
     * @param  string  $column
     * @param  string  $customName
     * @param  bool  $multipleFiles
     * @param  string  $storageDirectory
     */
    public static function make($column, $customName = null, $typeFile = null, $multipleFiles = false, $storageDirectory = 'uploads'): FileUpload
    {
        $input = FileUpload::make($column)->label(empty($customName) ? $column : $customName);
        $input = $input->acceptedFileTypes(static::rules($typeFile));

        if ($multipleFiles) {
            $input = $input->multiple();
        }

        $input = $input->directory($storageDirectory);

        $input = $input
            ->getUploadedFileNameForStorageUsing(fn ($file) => uniqid().$file->hashName())
            ->downloadable()
            ->previewable()
            ->openable();

        if (filled($typeFile) && method_exists(static::class, (string) $typeFile)) {
            $input = static::class::$typeFile($input);
        }

        return $input;
    }

    public static function rules(?string $typeFile = null): array
    {
        return match ($typeFile) {
            'image' => ['image/*'],
            'image_video' => ['image/*', 'video/mp4', 'video/avi', 'video/mkv', 'video/quicktime'],
            'video' => ['video/mp4', 'video/avi', 'video/mkv', 'video/quicktime'],
            'audio' => ['audio/mp3', 'audio/wav'],
            'pdf' => ['application/pdf'],
            'word' => ['application/doc', 'application/docx', 'application/ms-word', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'],
            'excel' => ['application/xsl', 'application/xsls', 'application/xslx', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'],
            'powerpoint' => ['application/ppt', 'application/pptx', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.slideshow', 'application/vnd.openxmlformats-officedocument.presentationml.presentation'],
            'document' => [
                'application/pdf',
                'application/doc', 'application/docx', 'application/ms-word', 'application/ms-word', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'application/xsl', 'application/xsls', 'application/xslx', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'application/ppt', 'application/pptx', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.slideshow', 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
            ],
            default => ['*'],
        };
    }

    public static function image(mixed $input): mixed
    {
        return $input->image()
            ->imageEditor()
            ->imagePreviewHeight('256px');
    }

    public static function image_video(mixed $input): mixed
    {
        return $input
            ->imageEditor()
            ->imagePreviewHeight('256px');
    }
}
