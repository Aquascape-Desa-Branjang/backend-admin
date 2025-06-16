<?php

namespace App\Filament\Admin\Pages;

use App\Models\Base\Setting;
use App\Support\FilamentBase\Forms\ImageUpload;
use Filament\Forms;
use Filament\Forms\Form;

class SettingPageForContentProduct extends SettingPageForContent
{
    protected static ?string $slug = 'system/settings-content-home';

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
                Forms\Components\Section::make('Section 1')
                    ->collapsible()
                    ->schema($this->section1()),
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
                Forms\Components\Section::make('Section 7')
                    ->collapsible()
                    ->schema($this->section7()),
                Forms\Components\Section::make('Section 8')
                    ->collapsible()
                    ->schema($this->section8()),
            ]);
    }

    public function section1(): array
    {
        return [
            Forms\Components\TextInput::make('home_s1_title')
                ->label('Title')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            ImageUpload::make('home_s1_background_image')
                ->label('Background Image')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            Forms\Components\Fieldset::make('CTA')->schema([
                Forms\Components\TextInput::make('home_s1_button_text')
                    ->label('Text')
                    ->columnSpanFull()
                    ->disabled($this->disableForm)
                    ->required(),

                Forms\Components\TextInput::make('home_s1_button_url')
                    ->label('URL')
                    ->url()
                    ->columnSpanFull()
                    ->disabled($this->disableForm)
                    ->required(),

                ImageUpload::make('home_s1_button_icon')
                    ->label('Icon')
                    ->columnSpanFull()
                    ->disabled($this->disableForm)
                    ->required(),
            ]),

            Forms\Components\Fieldset::make('Statistics')
                ->schema([
                    Forms\Components\Repeater::make('home_s1_statistics')
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
            Forms\Components\TextInput::make('home_s2_title')
                ->label('Title')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            Forms\Components\TextInput::make('home_s2_subtitle')
                ->label('Subtitle')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            Forms\Components\Textarea::make('home_s2_description')
                ->label('Address')
                ->rows(3)
                ->columnSpanFull()
                ->disabled($this->disableForm),

            ImageUpload::make('home_s2_image_title')
                ->label('Image Title')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            ImageUpload::make('home_s2_image_description')
                ->label('Image Description')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            Forms\Components\Fieldset::make('CTA')->schema([
                Forms\Components\TextInput::make('home_s2_button_text')
                    ->label('Text')
                    ->columnSpanFull()
                    ->disabled($this->disableForm)
                    ->required(),

                Forms\Components\TextInput::make('home_s2_button_url')
                    ->label('URL')
                    ->url()
                    ->columnSpanFull()
                    ->disabled($this->disableForm)
                    ->required(),

                ImageUpload::make('home_s2_button_icon')
                    ->label('Icon')
                    ->columnSpanFull()
                    ->disabled($this->disableForm)
                    ->required(),
            ]),
        ];
    }

    public function section3(): array
    {
        return [
            Forms\Components\TextInput::make('home_s3_title')
                ->label('Title')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            Forms\Components\TextInput::make('home_s3_subtitle')
                ->label('Subtitle')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            ImageUpload::make('home_s3_next_icon')
                ->label('Next Image CTA')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),
        ];
    }

    public function section4(): array
    {
        return [
            Forms\Components\TextInput::make('home_s4_title')
                ->label('Title')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            Forms\Components\TextInput::make('home_s4_subtitle')
                ->label('Subtitle')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            ImageUpload::make('home_s4_background_image')
                ->label('Background Image')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            Forms\Components\Fieldset::make('CTA')->schema([
                Forms\Components\TextInput::make('home_s4_button_text')
                    ->label('Text')
                    ->columnSpanFull()
                    ->disabled($this->disableForm)
                    ->required(),

                ImageUpload::make('home_s4_button_icon')
                    ->label('Icon')
                    ->columnSpanFull()
                    ->disabled($this->disableForm)
                    ->required(),
            ]),

            Forms\Components\Fieldset::make('Operations')
                ->schema([
                    Forms\Components\Repeater::make('home_s4_operations')
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

                            Forms\Components\TextInput::make('url')
                                ->label('URL')
                                ->url()
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->required(),

                            Forms\Components\TextInput::make('description')
                                ->label('Description')
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->nullable(),

                            ImageUpload::make('image')
                                ->label('Image')
                                ->columnSpanFull()
                                ->disabled($this->disableForm)
                                ->required(),
                        ]),
                ]),
        ];
    }

    public function section5(): array
    {
        return [
            Forms\Components\TextInput::make('home_s5_title')
                ->label('Title')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            Forms\Components\TextInput::make('home_s5_subtitle')
                ->label('Subtitle')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            ImageUpload::make('home_s5_flow_image')
                ->label('Flow Image')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),
        ];
    }

    public function section6(): array
    {
        return [
            Forms\Components\TextInput::make('home_s6_video_url')
                ->label('Video URL')
                ->url()
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),
        ];
    }

    public function section7(): array
    {
        return [
            Forms\Components\TextInput::make('home_s7_title')
                ->label('Title')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            Forms\Components\TextInput::make('home_s7_subtitle')
                ->label('Subtitle')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            Forms\Components\Fieldset::make('CTA')->schema([
                Forms\Components\TextInput::make('home_s7_button_text')
                    ->label('Text')
                    ->columnSpanFull()
                    ->disabled($this->disableForm)
                    ->required(),

                Forms\Components\TextInput::make('home_s7_button_url')
                    ->label('URL')
                    ->url()
                    ->columnSpanFull()
                    ->disabled($this->disableForm)
                    ->required(),

                ImageUpload::make('home_s7_button_icon')
                    ->label('Icon')
                    ->columnSpanFull()
                    ->disabled($this->disableForm)
                    ->required(),

            ]),

            Forms\Components\Fieldset::make('Images')
                ->schema([
                    Forms\Components\Repeater::make('home_s7_images')
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

    public function section8(): array
    {
        return [
            Forms\Components\TextInput::make('home_s8_title')
                ->label('Title')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            ImageUpload::make('home_s8_background_image')
                ->label('Background Image')
                ->columnSpanFull()
                ->disabled($this->disableForm)
                ->required(),

            Forms\Components\Fieldset::make('CTA')->schema([
                Forms\Components\TextInput::make('home_s8_button_text')
                    ->label('Text')
                    ->columnSpanFull()
                    ->disabled($this->disableForm)
                    ->required(),

                ImageUpload::make('home_s8_button_icon')
                    ->label('Icon')
                    ->columnSpanFull()
                    ->disabled($this->disableForm)
                    ->required(),
            ]),
        ];
    }
}
