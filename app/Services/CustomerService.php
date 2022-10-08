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

    public function getCustomer($tel, $email): ?Customer
    {
        return Customer::where('tel', $tel)->where('email', $email)->first();
    }

    public function setCustomer($full_name, $tel, $is_company, $company_name, $email): Customer
    {
       $customer = $this->getCustomer($tel, $email);

        if (empty($customer))
            return  Customer::create([
                'full_name' => $full_name,
                'tel' => $tel,
                'is_company' => $is_company,
                'company_name' => $company_name,
                'email' => $email,
            ]);
        else return $customer;
    }
}
