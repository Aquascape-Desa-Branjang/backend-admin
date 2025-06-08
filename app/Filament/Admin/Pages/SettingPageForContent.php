<?php

namespace App\Filament\Admin\Pages;

use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Illuminate\Contracts\Support\Htmlable;

/**
 * @property \Filament\Forms\ComponentContainer $form
 */
class SettingPageForContent extends SettingPage
{
    protected ?string $group = 'content';

    protected static ?string $slug = 'system/settings-content';

    protected static bool $shouldRegisterNavigation = false;

    public function getTitle(): string|Htmlable
    {
        return 'Content Setting';
    }

    public function getSubNavigation(): array
    {
        return [
            NavigationItem::make(__('admin.back'))
                ->icon('heroicon-o-arrow-left-on-rectangle')
                ->url(SettingPageForApp::getUrl())
                ->isActiveWhen(fn () => static::class == SettingPageForApp::class),
            NavigationGroup::make(__('admin.contents'))
                ->items([
                    NavigationItem::make(__('admin.home_page'))
                        ->icon('heroicon-o-home-modern')
                        ->url(SettingPageForContentHome::getUrl())
                        ->isActiveWhen(fn () => static::class == SettingPageForContentHome::class),
                    NavigationItem::make('About Us')
                        ->icon('heroicon-o-information-circle')
                        ->url(SettingPageForContentAboutUs::getUrl())
                        ->isActiveWhen(fn () => static::class == SettingPageForContentAboutUs::class),
                    NavigationItem::make('Our Services')
                        ->icon('heroicon-o-wrench-screwdriver')
                        ->url(SettingPageForContentOurServices::getUrl())
                        ->isActiveWhen(fn () => static::class == SettingPageForContentOurServices::class),
                    NavigationItem::make('E-Procurement')
                        ->icon('heroicon-o-inbox-stack')
                        ->url(SettingPageForContentEProcurement::getUrl())
                        ->isActiveWhen(fn () => static::class == SettingPageForContentEProcurement::class),
                    NavigationItem::make('Career')
                        ->icon('heroicon-o-briefcase')
                        ->url(SettingPageForContentCareer::getUrl())
                        ->isActiveWhen(fn () => static::class == SettingPageForContentCareer::class),
                    NavigationItem::make('Contact')
                        ->icon('heroicon-o-identification')
                        ->url(SettingPageForContentContact::getUrl())
                        ->isActiveWhen(fn () => static::class == SettingPageForContentContact::class),
                ]),
        ];
    }
}
