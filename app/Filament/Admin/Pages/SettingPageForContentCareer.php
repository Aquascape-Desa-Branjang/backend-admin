<?php

namespace App\Filament\Admin\Pages;

use App\Models\Base\Setting;
use App\Support\FilamentBase\Forms\ImageUpload;
use Filament\Forms;
use Filament\Forms\Form;

class SettingPageForContentCareer extends SettingPageForContent
{
    protected static ?string $slug = 'system/settings-content-career';

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
            ]);
    }

    public function section1(): array
    {
        return [
            Forms\Components\TextInput::make('career_s1_title')
                ->label('Title')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            Forms\Components\TextInput::make('career_s1_subtitle')
                ->label('Subtitle')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            ImageUpload::make('career_s1_background_image')
                ->label('Background Image')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),
        ];
    }

    public function section2(): array
    {
        return [
            Forms\Components\Fieldset::make('Filter')->schema([
                Forms\Components\TextInput::make('career_s2_filter_text')
                    ->label('Filter Text')
                    ->columnSpanFull()
                    ->disabled($this->disableForm)
                    ->required(),

                Forms\Components\TextInput::make('career_s2_filter_location_placeholder')
                    ->label('Filter Location Placeholder')
                    ->columnSpanFull()
                    ->disabled($this->disableForm)
                    ->required(),

                Forms\Components\TextInput::make('career_s2_filter_division_placeholder')
                    ->label('Filter Division Placeholder')
                    ->columnSpanFull()
                    ->disabled($this->disableForm)
                    ->required(),
            ]),

            Forms\Components\Fieldset::make('Accordion')->schema([
                Forms\Components\TextInput::make('career_s2_accordion_requirement_text')
                    ->label('Requirement Text')
                    ->columnSpanFull()
                    ->disabled($this->disableForm)
                    ->required(),

                ImageUpload::make('career_s2_accordion_requirement_checked_icon')
                    ->label('Requirement Checked Icon')
                    ->columnSpanFull()
                    ->disabled($this->disableForm)
                    ->required(),

                ImageUpload::make('career_s2_accordion_location_icon')
                    ->label('Location Icon')
                    ->columnSpanFull()
                    ->disabled($this->disableForm)
                    ->required(),

                ImageUpload::make('career_s2_accordion_division_icon')
                    ->label('Division Icon')
                    ->columnSpanFull()
                    ->disabled($this->disableForm)
                    ->required(),

                Forms\Components\Fieldset::make('CTA')->schema([
                    Forms\Components\TextInput::make('career_s2_accordion_button_text')
                        ->label('Text')
                        ->columnSpanFull()
                        ->disabled($this->disableForm)
                        ->required(),

                    ImageUpload::make('career_s2_accordion_button_icon')
                        ->label('Icon')
                        ->columnSpanFull()
                        ->disabled($this->disableForm)
                        ->required(),
                ]),
            ]),
        ];
    }
}
