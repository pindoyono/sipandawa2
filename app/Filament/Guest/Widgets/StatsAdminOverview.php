<?php

namespace App\Filament\Guest\Widgets;

use DB;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsAdminOverview extends BaseWidget
{

    protected function getStats(): array
    {
        $sd = DB::table('sekolahs')->where('jenjang', 'SD')->get()->count();
        $smp = DB::table('sekolahs')->where('jenjang', 'SMP')->get()->count();
        // dd($sd);
        return [
            //
            Stat::make('SMP', $sd . ' Sekolah'),
            Stat::make('SD', $smp . ' Sekolah'),
            Stat::make('v1.0', 'Sipandawa'),
        ];
    }
}
