<?php

namespace App\Filament\Admin\Pages;

use App\Models\Base\Setting;
use App\Support\FilamentBase\Forms\ImageUpload;
use Filament\Forms;
use Filament\Forms\Form;

class SettingPageForSiteNavbar extends SettingPageForSite
{
    protected static ?string $slug = 'system/settings-site-navbar';

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
                Forms\Components\Section::make('Requirements')
                    ->columns(2)
                    ->schema([
                        ImageUpload::make('navbar_logo')
                            ->label('Logo')
                            ->columnSpanFull()
                            ->disabled($this->disableForm)
                            ->required(),

                        ImageUpload::make('navbar_mobile_hamburger_icon')
                            ->label('Hamburger Icon')
                            ->disabled($this->disableForm)
                            ->required(),

                        ImageUpload::make('navbar_mobile_close_icon')
                            ->label('Close Icon')
                            ->disabled($this->disableForm)
                            ->required(),
                    ]),
                Forms\Components\Section::make(__('admin.navigation'))
                    ->schema([
                        Forms\Components\Repeater::make('navbar_navigations')
                            ->hiddenLabel()
                            ->columnSpanFull()
                            ->collapsible(true)
                            ->collapsed(true)
                            ->itemLabel(fn ($state) => @$state['title'])
                            ->disabled($this->disableForm)
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label(__('admin.title'))
                                    ->columnSpanFull()
                                    ->disabled($this->disableForm)
                                    ->required(),
                                Forms\Components\TextInput::make('url')
                                    ->label(__('admin.url'))
                                    ->columnSpanFull()
                                    ->disabled($this->disableForm)
                                    ->nullable(),
                            ]),
                    ]),
            ]);
    }
}
