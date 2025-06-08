<?php

namespace App\Filament\Admin\Pages;

use App\Models\Base\Setting;
use App\Support\FilamentBase\Forms\ImageUpload;
use Filament\Forms;
use Filament\Forms\Form;

class SettingPageForSiteBackground extends SettingPageForSite
{
    protected static ?string $slug = 'system/settings-site-background';

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
                Forms\Components\Section::make(__('admin.loading_image'))
                    ->schema([
                        ImageUpload::make('bg_loading_screen')
                            ->imageEditor(false)
                            ->hiddenLabel()
                            ->disabled($this->disableForm)
                            ->required(),
                    ]),
                Forms\Components\Section::make(__('admin.authentication_page'))
                    ->schema([
                        ImageUpload::make('bg_authentication')
                            ->hiddenLabel()
                            ->hint(__('admin.used_in').': login, register, reset password')
                            ->disabled($this->disableForm)
                            ->required(),
                    ]),
                Forms\Components\Section::make(__('admin.not_found_page'))
                    ->schema([
                        ImageUpload::make('bg_notfound_page')
                            ->hiddenLabel()
                            ->hint(__('admin.used_in').': 404 not found')
                            ->disabled($this->disableForm)
                            ->required(),
                    ]),
            ]);
    }
}
