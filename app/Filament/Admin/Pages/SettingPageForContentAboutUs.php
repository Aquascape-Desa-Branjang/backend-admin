<?php

namespace App\Filament\Admin\Pages;

use App\Models\Base\Setting;
use App\Support\FilamentBase\Forms\ImageUpload;
use Filament\Forms;
use Filament\Forms\Form;

class SettingPageForContentAboutUs extends SettingPageForContent
{
    protected static ?string $slug = 'system/settings-content-about-us';

    public static int $missionCount = 1;

    public static int $imageCount = 1;

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
                Forms\Components\Section::make('Section 2')
                    ->collapsible()
                    ->schema($this->section2()),
                Forms\Components\Section::make('Section 3')
                    ->collapsible()
                    ->schema($this->section3()),
                Forms\Components\Section::make('Section 4')
                    ->collapsible()
                    ->schema($this->section4()),
                Forms\Components\Section::make('Section 5')
                    ->collapsible()
                    ->schema($this->section5()),
                Forms\Components\Section::make('Section 6')
                    ->collapsible()
                    ->schema($this->section6()),
            ]);
    }

    public function section2(): array
    {
        return [
            Forms\Components\TextInput::make('about-us_s2_title')
                ->label('Title')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            Forms\Components\TextInput::make('about-us_s2_subtitle')
                ->label('Subtitle')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            Forms\Components\Textarea::make('about-us_s2_description')
                ->label('Description')
                ->rows(3)
                ->columnSpanFull()
                ->disabled($this->disableForm),

            ImageUpload::make('about-us_s2_image_title')
                ->label('Image Title')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            ImageUpload::make('about-us_s2_image_description')
                ->label('Image Description')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),
        ];
    }

    public function section3(): array
    {
        return [
            Forms\Components\Fieldset::make('Vision')
                ->schema([
                    Forms\Components\TextInput::make('about-us_s3_vision_title')
                        ->label('Title')
                        ->columnSpanFull()
                        ->disabled($this->disableForm)
                        ->required(),

                    Forms\Components\Textarea::make('about-us_s3_vision_description')
                        ->label('Address')
                        ->rows(3)
                        ->columnSpanFull()
                        ->disabled($this->disableForm),

                    ImageUpload::make('about-us_s3_vision_image')
                        ->label('Image Vision')
                        ->columnSpanFull()
                        ->disabled($this->disableForm)
                        ->required(),
                ]),

            Forms\Components\Fieldset::make('Mission')
                ->schema([
                    Forms\Components\TextInput::make('about-us_s3_mission_title')
                        ->label('Title')
                        ->columnSpanFull()
                        ->disabled($this->disableForm)
                        ->required(),

                    ImageUpload::make('about-us_s3_mission_image')
                        ->label('Image Title')
                        ->columnSpanFull()
                        ->disabled($this->disableForm)
                        ->required(),

                    ImageUpload::make('about-us_s3_checked_icon')
                        ->label('Checked Icon')
                        ->columnSpanFull()
                        ->disabled($this->disableForm)
                        ->required(),

                    Forms\Components\Repeater::make('about-us_s3_mission_list')
                        ->hiddenLabel()
                        ->columnSpanFull()
                        ->collapsible(true)
                        ->collapsed(true)
                        ->itemLabel(fn (): string => 'Mission '.self::$missionCount++)
                        ->disabled($this->disableForm)
                        ->schema([
                            Forms\Components\TextInput::make('value')
                                ->label('Value')
                                ->hiddenLabel()
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->nullable(),
                        ]),
                ]),
        ];
    }

    public function section4(): array
    {
        return [
            Forms\Components\TextInput::make('about-us_s4_title')
                ->label('Title')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            ImageUpload::make('about-us_s4_background_image')
                ->label('Background Image')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            ImageUpload::make('about-us_s4_next_icon')
                ->label('Next Icon')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),
        ];
    }

    public function section5(): array
    {
        return [
            Forms\Components\TextInput::make('about-us_s5_title')
                ->label('Title')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            Forms\Components\TextInput::make('about-us_s5_subtitle')
                ->label('Subtitle')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            Forms\Components\Fieldset::make('CTA')->schema([
                Forms\Components\TextInput::make('about-us_s5_button_text')
                    ->label('Text')
                    ->columnSpanFull()
                    ->disabled($this->disableForm)
                    ->required(),

                ImageUpload::make('about-us_s5_button_icon')
                    ->label('Button Icon')
                    ->columnSpanFull()
                    ->disabled($this->disableForm)
                    ->required(),

                ImageUpload::make('about-us_s5_button_close_icon')
                    ->label('Button Close Icon')
                    ->columnSpanFull()
                    ->disabled($this->disableForm)
                    ->required(),

                ImageUpload::make('about-us_s5_button_next_icon')
                    ->label('Button Next Icon')
                    ->columnSpanFull()
                    ->disabled($this->disableForm)
                    ->required(),
            ]),

            Forms\Components\Fieldset::make('Galleries')
                ->schema([
                    Forms\Components\Repeater::make('about-us_s5_galleries')
                        ->hiddenLabel()
                        ->columnSpanFull()
                        ->collapsible(true)
                        ->itemLabel(fn (): string => 'Image '.self::$imageCount++)
                        ->disabled($this->disableForm)
                        ->addable(false)
                        ->deletable(false)
                        ->schema([
                            ImageUpload::make('path')
                                ->hiddenLabel()
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->required(),
                        ]),
                ]),
        ];
    }

    public function section6(): array
    {
        return [
            Forms\Components\TextInput::make('about-us_s6_title')
                ->label('Title')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            ImageUpload::make('about-us_s6_background_image')
                ->label('Background Image')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            Forms\Components\Fieldset::make('CTA')->schema([
                Forms\Components\TextInput::make('about-us_s6_button_text')
                    ->label('Text')
                    ->columnSpanFull()
                    ->disabled($this->disableForm)
                    ->required(),

                ImageUpload::make('about-us_s6_button_icon')
                    ->label('Icon')
                    ->columnSpanFull()
                    ->disabled($this->disableForm)
                    ->required(),
            ]),
        ];
    }
}
