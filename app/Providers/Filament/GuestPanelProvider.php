<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\Widgets;
use App\Models\Ijazah;
use Widgets\SekolahChart;
use Filament\PanelProvider;
use Filament\Pages\Dashboard;
use Filament\Support\Colors\Color;
use Filament\Navigation\NavigationItem;
use Filament\Http\Middleware\Authenticate;
use App\Http\Middleware\UserMenuItemMiddleware;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;

class GuestPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('guest')
            ->path('')
            // ->login(null)
            ->colors([
                'primary' => Color::Indigo,
            ])
            ->discoverResources(in: app_path('Filament/Guest/Resources'), for: 'App\\Filament\\Guest\\Resources')
            ->discoverPages(in: app_path('Filament/Guest/Pages'), for: 'App\\Filament\\Guest\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
	->brandLogo(asset('images/logo.svg'))
	->favicon(asset('images/logo.svg'))
	->brandLogoHeight('3rem')
            ->navigationItems([
                NavigationItem::make('Cari Ijazah')
                    ->url(url('/ijazahs'))
                    ->icon('heroicon-o-magnifying-glass')
                    ->sort(3),
                NavigationItem::make('Data Sekolah SD')
                    ->url(url('/sekolah-sds'))
                    ->icon('heroicon-o-server')
                    ->sort(3),
                NavigationItem::make('Data Sekolah SMP')
                    ->url(url('/sekolahs'))
                    ->icon('heroicon-o-server-stack')
                    ->sort(3),
                NavigationItem::make('Admin')
                    ->url(url('/admin'))
                    ->icon('heroicon-o-rocket-launch')
                    ->sort(3),
            ])
            ->discoverWidgets(in: app_path('Filament/Guest/Widgets'), for: 'App\\Filament\\Guest\\Widgets')
            ->widgets([
                //SekolahChart ::class,
                //Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                // Authenticate::class,
            ])
            ->topNavigation()

            ->navigationItems([

            ])
            ->viteTheme('resources/css/filament/admin/theme.css');
    }
}
//filament.admin.resources.sekolahs.create
