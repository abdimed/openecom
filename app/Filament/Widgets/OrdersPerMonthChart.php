<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Services\OrderService;
use Filament\Widgets\LineChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;


class OrdersPerMonthChart extends LineChartWidget
{
    protected static ?string $heading = 'Commandes par mois';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $orders = new OrderService;

        return [
            'datasets' => [
                [
                    'label' => 'Toutes',
                    'data' => $orders->allPerMonth(),
                    'tension' =>  0.3,
                ],
                [
                    'label' => 'Nouvelles',
                    'data' => $orders->newPerMonth(),
                    'backgroundColor' => [
                        'rgba(77, 222, 128, 1)',
                    ],
                    'borderColor' => [
                        'rgba(77, 222, 128, 1)',
                    ],
                   'tension' =>  0.3,
                ],

                [
                    'label' => 'Annulés',
                    'data' => $orders->cancelledPerMonth(),
                    'backgroundColor' => [
                        'rgba(255, 65, 54, 1)',
                    ],
                    'borderColor' => [
                        'rgba(255, 99, 132, 1)',
                    ],
                    'tension' =>  0.3,
                ],
            ],
            'labels' => $orders->getMonth(),

        ];
    }
}
