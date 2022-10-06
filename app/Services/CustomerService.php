<?php

namespace App\Services;

use App\Models\Customer;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class CustomerService
{
    public function allPerMonth(): array
    {
        return Trend::model(Customer::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )->perMonth()
            ->count()
            ->map(fn (TrendValue $value) => $value->aggregate)
            ->toArray();
    }

}
