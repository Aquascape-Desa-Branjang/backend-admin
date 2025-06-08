<?php

namespace App\Filament\Admin\Pages;

use App\Models\Base\Setting;
use App\Support\FilamentBase\Forms\ImageUpload;
use Filament\Forms;
use Filament\Forms\Form;

class SettingPageForContentOurServices extends SettingPageForContent
{
    protected static ?string $slug = 'system/settings-content-our-services';

    public function afterMount(): void
    {
        $data = Setting::get($this->group);

        $data = $data ? array_map(fn ($x) => json_decode($x, true) ?: $x, $data) : [];

        $this->form->fill($data);
    }

    public function form(Form $form): Form
    {
        return $form
            ->statePath('data')
            ->schema([
                Forms\Components\Section::make('Section 1')
                    ->collapsible()
                    ->schema($this->section1()),
                Forms\Components\Section::make('Section 2')
                    ->collapsible()
                    ->schema($this->section2()),
                Forms\Components\Section::make('Section 3')
                    ->collapsible()
                    ->schema($this->section3()),
            ]);
    }

    public function section1(): array
    {
        return [
            Forms\Components\TextInput::make('our-services_s1_title')
                ->label('Title')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            Forms\Components\TextInput::make('our-services_s1_subtitle')
                ->label('Subtitle')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            ImageUpload::make('our-services_s1_background_image')
                ->label('Background Image')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            Forms\Components\Fieldset::make('Statistics')
                ->schema([
                    Forms\Components\Repeater::make('our-services_s1_statistics')
                        ->hiddenLabel()
                        ->columnSpanFull()
                        ->collapsible(true)
                        ->collapsed(true)
                        ->itemLabel(fn ($state) => @$state['title'])
                        ->disabled($this->disableForm)
                        ->addable(false)
                        ->deletable(false)
                        ->schema([
                            Forms\Components\TextInput::make('title')
                                ->label('Title')
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->required(),
                            Forms\Components\TextInput::make('subtitle')
                                ->label('Subtitle')
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->required(),
                            Forms\Components\TextInput::make('value')
                                ->label('Value')
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->nullable(),
                        ]),
                ]),
        ];
    }

    public function section2(): array
    {
        return [
            Forms\Components\TextInput::make('our-services_s2_title')
                ->label('Title')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),
        ];
    }

    public function section3(): array
    {
        return [
            Forms\Components\TextInput::make('our-services_s3_title')
                ->label('Title')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),
        ];
    }
}
