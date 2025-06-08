<?php

namespace App\Filament\Admin\Pages;

use App\Models\Base\Setting;
use App\Support\FilamentBase\Forms\ImageUpload;
use Filament\Forms;
use Filament\Forms\Form;

class SettingPageForSiteOther extends SettingPageForSite
{
    protected static ?string $slug = 'system/settings-site-other';

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
                Forms\Components\Section::make()
                    ->columns(2)
                    ->schema([
                        ImageUpload::make('other_default_avatar_path')
                            ->label('Default Avatar Image')
                            ->columnSpanFull()
                            ->disabled($this->disableForm)
                            ->required(),
                        Forms\Components\TextInput::make('other_google_analytics_code')
                            ->label('Google Analytics Code')
                            ->columnSpanFull()
                            ->disabled($this->disableForm)
                            ->required(),
                    ]),
            ]);
    }
}
