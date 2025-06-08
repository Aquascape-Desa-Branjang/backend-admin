<?php

namespace App\Filament\Admin\Pages;

use App\Models\Base\Setting;
use App\Support\FilamentBase\Forms\ImageUpload;
use Filament\Forms;
use Filament\Forms\Form;

class SettingPageForSiteFooter extends SettingPageForSite
{
    protected static ?string $slug = 'system/settings-site-footer';

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
                Forms\Components\Section::make(__('admin.logo'))
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        ImageUpload::make('footer_logo')
                            ->label(__('admin.logo'))
                            ->disabled($this->disableForm)
                            ->required(),
                        Forms\Components\Textarea::make('footer_logo_content')
                            ->label(__('admin.content'))
                            ->rows(3)
                            ->disabled($this->disableForm),
                    ]),
                Forms\Components\Section::make('Information')
                    ->collapsible()
                    ->schema([
                        Forms\Components\Fieldset::make('Phone')->schema([
                            Forms\Components\TextInput::make('footer_phone_title')
                                ->label('Title')
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->required(),

                            Forms\Components\TextInput::make('footer_phone_value')
                                ->label('Value')
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->required(),
                        ]),

                        Forms\Components\Fieldset::make('Email')->schema([
                            Forms\Components\TextInput::make('footer_email_title')
                                ->label('Title')
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->required(),

                            Forms\Components\TextInput::make('footer_email_value')
                                ->label('Value')
                                ->email()
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->required(),
                        ]),

                        Forms\Components\Fieldset::make('Address')->schema([
                            Forms\Components\TextInput::make('footer_address_title')
                                ->label('Title')
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->required(),

                            Forms\Components\Textarea::make('footer_address_value')
                                ->label('Value')
                                ->rows(3)
                                ->columnSpanFull()
                                ->disabled($this->disableForm),
                        ]),

                        Forms\Components\Fieldset::make('Social Media')->schema([
                            Forms\Components\TextInput::make('footer_social_title')
                                ->label('Text')
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->required(),

                            Forms\Components\Repeater::make('footer_social_values')
                                ->label(strtolower(__('admin.social_media')))
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
                                    ImageUpload::make('icon')
                                        ->label(__('admin.icon'))
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

                        Forms\Components\Fieldset::make('Navigation')->schema([
                            Forms\Components\TextInput::make('footer_navigation_title')
                                ->label('Text')
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->required(),

                            Forms\Components\Repeater::make('footer_navigation_values')
                                ->label(strtolower(__('admin.navigation')))
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
                    ]),

                Forms\Components\Section::make('Legal Navigation')
                    ->collapsible()
                    ->schema([
                        Forms\Components\Repeater::make('footer_legal_navigations')
                            ->label('Legal Navigation')
                            ->hiddenLabel()
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

                Forms\Components\Section::make(__('admin.copyright'))
                    ->collapsible()
                    ->schema([
                        Forms\Components\TextInput::make('footer_copyright_text')
                            ->hiddenLabel()
                            ->columnSpanFull()
                            ->disabled($this->disableForm)
                            ->required(),
                    ]),

            ]);
    }
}
