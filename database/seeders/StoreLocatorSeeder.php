<?php

namespace Database\Seeders;

use Botble\Ecommerce\Models\StoreLocator;
use Botble\Setting\Models\Setting as SettingModel;
use Illuminate\Database\Seeder;

class StoreLocatorSeeder extends Seeder
{
    public function run(): void
    {
        StoreLocator::truncate();

        $storeLocator = StoreLocator::create([
            'name' => 'Shopwise',
            'email' => 'sales@botble.com',
            'phone' => '123-456-7890',
            'address' => '123 Street, Old Trafford',
            'state' => 'New York',
            'city' => 'New York',
            'country' => 'US',
            'is_primary' => 1,
            'is_shipping_location' => 1,
        ]);

        SettingModel::whereIn('key', [
            'ecommerce_store_name',
            'ecommerce_store_phone',
            'ecommerce_store_address',
            'ecommerce_store_state',
            'ecommerce_store_city',
            'ecommerce_store_country',
        ])->delete();

        SettingModel::insertOrIgnore([
            [
                'key' => 'ecommerce_store_name',
                'value' => $storeLocator->name,
            ],
            [
                'key' => 'ecommerce_store_phone',
                'value' => $storeLocator->phone,
            ],
            [
                'key' => 'ecommerce_store_address',
                'value' => $storeLocator->address,
            ],
            [
                'key' => 'ecommerce_store_state',
                'value' => $storeLocator->state,
            ],
            [
                'key' => 'ecommerce_store_city',
                'value' => $storeLocator->city,
            ],
            [
                'key' => 'ecommerce_store_country',
                'value' => $storeLocator->country,
            ],
        ]);
    }
}
