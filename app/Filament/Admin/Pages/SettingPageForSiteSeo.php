<?php

namespace App\Filament\Admin\Pages;

use App\Models\Base\Setting;
use App\Support\FilamentBase\Forms\ImageUpload;
use Filament\Forms;
use Filament\Forms\Form;

class SettingPageForSiteSeo extends SettingPageForSite
{
    protected static ?string $slug = 'system/settings-site-seo';

    public function afterMount(): void
    {
        $data = Setting::get($this->group);

        $data = array_map(fn ($x) => json_decode($x, true) ?: $x, $data);

        $this->form->fill($data);
    }

    public function form(Form $form): Form
    {
        return $form
            ->statePath('data')
            ->schema([
                Forms\Components\Section::make('Default SEO')
                    ->schema([
                        ImageUpload::make('seo_default_cover_path')
                            ->label(__('admin.cover'))
                            ->imageCropAspectRatio('16:9')
                            ->disabled($this->disableForm)
                            ->maxSize(2048),
                        Forms\Components\TextInput::make('seo_default_author')
                            ->label(__('admin.author'))
                            ->disabled($this->disableForm)
                            ->maxLength(255),
                        Forms\Components\Textarea::make('seo_default_description')
                            ->cols(3)
                            ->label(__('admin.description'))
                            ->disabled($this->disableForm)
                            ->maxLength(1024),
                        Forms\Components\TagsInput::make('seo_default_keywords')
                            ->label(__('admin.keywords'))
                            ->separator(', ')
                            ->disabled($this->disableForm),
                    ]),
            ]);
    }
}
