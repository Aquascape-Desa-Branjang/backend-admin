<?php

namespace App\Filament\Admin\Pages;

use App\Models\Base\Setting;
use Filament\Actions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Navigation\NavigationItem;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Pages\SubNavigationPosition;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Arr;

/**
 * @property \Filament\Forms\ComponentContainer $form
 */
class SettingPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $slug = 'system/settings';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.admin--setting-page';

    protected ?string $group = null;

    public bool $disableForm = true;

    public ?array $data = [];

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Start;

    public static function getNavigationGroup(): ?string
    {
        return __('permission.system');
    }

    public static function getNavigationLabel(): string
    {
        return __('admin.setting');
    }

    public static function getNavigationItems(): array
    {
        return [
            NavigationItem::make(static::getNavigationLabel())
                ->group(static::getNavigationGroup())
                ->icon(static::getNavigationIcon())
                ->isActiveWhen(fn (): bool => request()->routeIs(static::getNavigationItemActiveRoutePattern().'*'))
                ->sort(static::getNavigationSort())
                ->url(static::getNavigationUrl()),
        ];
    }

    public function getTitle(): string|Htmlable
    {
        return __('admin.setting');
    }

    public function getBreadcrumbs(): array
    {
        return [
            static::getNavigationGroup(),
            static::getNavigationLabel(),
        ];
    }

    public function getSubNavigation(): array
    {
        return [
            NavigationItem::make(__('admin.app'))
                ->icon('heroicon-o-cpu-chip')
                ->url(SettingPageForApp::getUrl())
                ->isActiveWhen(fn () => static::class == SettingPageForApp::class),
            // NavigationItem::make(__('admin.site'))
            //     ->icon('heroicon-o-globe-asia-australia')
            //     ->url(SettingPageForSiteNavbar::getUrl())
            //     ->isActiveWhen(fn () => static::class == SettingPageForSiteNavbar::class),
            NavigationItem::make('Contents')
                ->icon('heroicon-o-rectangle-stack')
                ->url(SettingPageForContentProduct::getUrl())
                ->isActiveWhen(fn () => static::class == SettingPageForContentProduct::class),
        ];
    }

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make()
                ->url($this->getUrl(['mode' => 'edit']))
                ->visible(fn ($livewire) => $livewire->disableForm),
        ];
    }

    public function getCancelButtonUrlProperty(): string
    {
        return static::getUrl();
    }

    public static function shouldRegisterNavigation(): bool
    {
        return static::$shouldRegisterNavigation
            && filament_user()->can('system.setting');
    }

    public function mount(): void
    {
        abort_unless(filament_user()->can('system.setting'), 403);

        $this->disableForm = request('mode', 'view') == 'view';

        if (request('save') == 'ok') {
            Notification::make()->success()->title(__('admin.saved'))->send();
        }

        $this->afterMount();
    }

    public function afterMount(): void
    {
        $this->redirect(SettingPageForApp::getUrl());
    }

    public function submit(): void
    {
        $changes = [];
        $data = array_map(
            fn ($x) => is_array($x) ? json_encode($x) : $x,
            $this->form->getState(),
        );

        $dataOnSettings = Setting::get($this->group);
        $dataOnSettings = Arr::only($dataOnSettings, array_keys($data));

        foreach ($data as $key => $value) {
            if ($value == @$dataOnSettings[$key]) {
                continue;
            }

            Setting::set("{$this->group}.{$key}", $value);
        }

        Setting::clearCache();

        $this->redirect(static::getUrl(['save' => 'ok']));
    }
}
