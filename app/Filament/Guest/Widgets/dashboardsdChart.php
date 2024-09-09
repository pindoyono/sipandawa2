<?php

namespace App\Filament\Guest\Widgets;

use Filament\Widgets\ChartWidget;

class dashboardsdChart extends ChartWidget
{
    protected static ?string $heading = 'Chart Data Ijazah SD';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Data Ijazah SD',
                    'data' => [0, 1, 2, 2, 21, 22, 45, 34, 15, 5, 37, 39],
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
