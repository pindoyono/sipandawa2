<?php

namespace App\Filament\Guest\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsAdminOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            //
            Stat::make('SMP', '41 Sekolah'),
            Stat::make('SD', '109 Sekolah'),
            Stat::make('V1.0', 'Sipandawa'),
        ];
    }
}
