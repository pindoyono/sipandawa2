<?php

namespace App\Filament\Guest\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class dashboardsdChart extends ChartWidget
{
    protected static ?string $heading = 'Chart Data Ijazah SD';

    protected function getData(): array
    {
        for ($i = 1; $i < 13; $i++) {
            $data[] = DB::table('ijazahs')->whereMonth('created_at', '=', $i)->get()->count();
        }
        return [
            'datasets' => [
                [
                    'label' => 'Data Ijazah SD',
                    // 'data' => [0, 0, 0, 0, 0, 0, 0, 15, 55, 0, 0, 0],
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
