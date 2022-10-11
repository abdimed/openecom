<?php

namespace App\Filament\Widgets;

use App\Services\CustomerService;
use App\Services\OrderService;
use Filament\Widgets\BarChartWidget;

class CustomerPerMonthChart extends BarChartWidget
{
    protected static ?string $heading = 'Clients par mois';
    protected static ?int $sort = 3;
    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Toutes',
                    'data' => (new CustomerService())->getArray(),
                    'tension' =>  0.3,
                ],

            ],
            'labels' => (new OrderService())->getMonth(),

        ];
    }
}
