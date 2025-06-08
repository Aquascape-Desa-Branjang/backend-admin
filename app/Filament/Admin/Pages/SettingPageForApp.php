<?php

namespace App\Filament\Admin\Pages;

use App\Models\Base\Setting;
use Filament\Forms;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Illuminate\Contracts\Support\Htmlable;

/**
 * @property \Filament\Forms\ComponentContainer $form
 */
class SettingPageForApp extends SettingPage
{
    protected ?string $group = 'app';

    protected static ?string $slug = 'system/settings-app';

    protected static bool $shouldRegisterNavigation = false;

    public function getTitle(): string|Htmlable
    {
        return __('admin.app_setting');
    }

    public function afterMount(): void
    {
        $this->form->fill(Setting::get($this->group));
    }

    public function form(Form $form): Form
    {
        return $form
            ->statePath('data')
            ->schema([
                Forms\Components\Section::make('Main')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__('admin.name'))
                            ->required()
                            ->disabled(),
                        Forms\Components\TextInput::make('short_name')
                            ->label(__('admin.short_name'))
                            ->required()
                            ->disabled(),
                        Forms\Components\TextInput::make('pt_name')
                            ->label('PT name')
                            ->required()
                            ->columnSpanFull()
                            ->disabled(),
                        // Forms\Components\Select::make('locale')
                        //     ->label(__('admin.locale'))
                        //     ->options([
                        //         'id' => 'Indonesia',
                        //         'en' => 'English',
                        //     ])
                        //     ->required()
                        //     ->disabled($this->disableForm),
                        // Forms\Components\TextInput::make('backup_password')
                        //     ->label(__('admin.backup_file_password'))
                        //     ->nullable()
                        //     ->disabled($this->disableForm),
                    ]),

                Forms\Components\Section::make('Lenna AI')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('lenna_app_url')
                            ->disabled($this->disableForm)
                            ->label('App Url')
                            ->required(),
                        Forms\Components\TextInput::make('lenna_web_chat_url')
                            ->disabled($this->disableForm)
                            ->label('Web Chat Url')
                            ->required(),
                        Forms\Components\TextInput::make('lenna_app_id')
                            ->disabled($this->disableForm)
                            ->label('Web Chat Url')
                            ->required(),
                        Forms\Components\TextInput::make('lenna_integration_id')
                            ->disabled($this->disableForm)
                            ->label('Integration Id')
                            ->required(),
                        Forms\Components\TextInput::make('lenna_user_id')
                            ->disabled($this->disableForm)
                            ->label('User Id')
                            ->nullable(),
                        Toggle::make('lenna_is_active')
                            ->disabled($this->disableForm)
                            ->label('Is Active?')
                            ->inline(false)
                            ->nullable(),
                    ]),
            ]);
    }
}
