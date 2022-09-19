<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\CustomerPurchase;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::factory(3)
            ->has(CustomerAddress::factory()->count(1), 'address')
            ->has(CustomerPurchase::factory()->count(2), 'purchases')
            ->create();
    }
}
