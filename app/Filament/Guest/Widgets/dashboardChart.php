<?php

namespace App\Filament\Guest\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class dashboardChart extends ChartWidget
{
    protected static ?string $heading = 'Chart Data Ijazah SMP';

    protected function getData(): array
    {
        // $ijazahsd = DB::table('ijazahs')->get()->count();
        // $ijazahsmp = DB::table('ijazah_smps')->get();
        // dd($ijazahsmp);
        for ($i = 1; $i < 13; $i++) {
            $data[] = DB::table('ijazah_smps')->whereMonth('created_at', '=', $i)->get()->count();
        }

        // dd($data);

        return [
            'datasets' => [
                [
                    'label' => 'Data Ijazah SMP',
                    // 'data' => [0, 0, 0, 0, 0, 0, 0, 5, 75, 0, 0, 0],
                    'data' => $data,
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
