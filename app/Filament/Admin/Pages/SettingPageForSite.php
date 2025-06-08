<?php

namespace App\Filament\Admin\Pages;

use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Illuminate\Contracts\Support\Htmlable;

/**
 * @property \Filament\Forms\ComponentContainer $form
 */
class SettingPageForSite extends SettingPage
{
    protected ?string $group = 'site';

    protected static ?string $slug = 'system/settings-site';

    protected static bool $shouldRegisterNavigation = false;

    public function getTitle(): string|Htmlable
    {
        return __('admin.site_setting');
    }

    public function getSubNavigation(): array
    {
        return [
            NavigationItem::make(__('admin.back'))
                ->icon('heroicon-o-arrow-left-on-rectangle')
                ->url(SettingPageForSite::getUrl())
                ->isActiveWhen(fn () => static::class == SettingPageForSite::class),
            NavigationGroup::make(__('admin.sites'))
                ->items([
                    // NavigationItem::make(__('admin.navbar'))
                    //     ->icon('heroicon-o-cursor-arrow-ripple')
                    //     ->url(SettingPageForSiteNavbar::getUrl())
                    //     ->isActiveWhen(fn () => static::class == SettingPageForSiteNavbar::class),
                    // NavigationItem::make(__('admin.footer'))
                    //     ->icon('heroicon-o-rectangle-group')
                    //     ->url(SettingPageForSiteFooter::getUrl())
                    //     ->isActiveWhen(fn () => static::class == SettingPageForSiteFooter::class),
                    // // NavigationItem::make(__('admin.background'))
                    // //     ->icon('heroicon-o-gif')
                    // //     ->url(SettingPageForSiteBackground::getUrl())
                    // //     ->isActiveWhen(fn () => static::class == SettingPageForSiteBackground::class),
                    // NavigationItem::make(__('admin.SEO'))
                    //     ->icon('heroicon-o-cube-transparent')
                    //     ->url(SettingPageForSiteSeo::getUrl())
                    //     ->isActiveWhen(fn () => static::class == SettingPageForSiteSeo::class),
                    // NavigationItem::make(__('admin.others'))
                    //     ->icon('heroicon-o-megaphone')
                    //     ->url(SettingPageForSiteOther::getUrl())
                    //     ->isActiveWhen(fn () => static::class == SettingPageForSiteOther::class),
                ]),
        ];
    }
}
