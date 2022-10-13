<?php

namespace App\Filament\Widgets;

use App\Services\CustomerService;
use App\Services\OrderService;
use Filament\Widgets\LineChartWidget;

class OrdersPerDayChart extends LineChartWidget
{
    protected static ?string $heading = 'Clients par mois';
    protected static ?int $sort = 3;
    protected function getData(): array
    {
        $orderService = new OrderService();

        return [
            'datasets' => [
                [
                    'label' => 'Toutes',
                    'data' => $orderService->getArrayPerDay(''),
                    'tension' =>  0.3,
                ],

            ],
            'labels' => (new OrderService())->getDay(),

        ];
    }
}
