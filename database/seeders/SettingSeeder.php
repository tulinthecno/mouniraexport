<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Blog\Models\Category;
use Botble\Blog\Models\Post;
use Botble\Blog\Models\Tag;
use Botble\Setting\Models\Setting as SettingModel;
use Botble\Slug\Models\Slug;
use SlugHelper;

class SettingSeeder extends BaseSeeder
{
    public function run(): void
    {
        SettingModel::whereIn('key', ['media_random_hash', 'ecommerce_load_countries_states_cities_from_location_plugin'])
            ->orWhere('key', 'LIKE', 'payment_%')
            ->delete();

        SettingModel::insertOrIgnore([
            [
                'key' => 'media_random_hash',
                'value' => md5(time()),
            ],
            [
                'key' => 'simple_slider_using_assets',
                'value' => 0,
            ],
        ]);

        SettingModel::insertOrIgnore([
            [
                'key' => SlugHelper::getPermalinkSettingKey(Post::class),
                'value' => 'news',
            ],
            [
                'key' => SlugHelper::getPermalinkSettingKey(Category::class),
                'value' => 'news',
            ],
            [
                'key' => SlugHelper::getPermalinkSettingKey(Tag::class),
                'value' => 'tags',
            ],
            [
                'key' => 'payment_cod_status',
                'value' => 1,
            ],
            [
                'key' => 'payment_cod_description',
                'value' => 'Please pay money directly to the postman, if you choose cash on delivery method (COD).',
            ],
            [
                'key' => 'payment_bank_transfer_status',
                'value' => 1,
            ],
            [
                'key' => 'payment_bank_transfer_description',
                'value' => 'Please send money to our bank account: ACB - 8210 4345 19.',
            ],
            [
                'key' => 'plugins_ecommerce_customer_new_order_status',
                'value' => '0',
            ],
            [
                'key' => 'plugins_ecommerce_admin_new_order_status',
                'value' => '0',
            ],
            [
                'key' => 'ecommerce_load_countries_states_cities_from_location_plugin',
                'value' => '0',
            ],
            [
                'key' => 'payment_stripe_payment_type',
                'value' => 'stripe_checkout',
            ],
            [
                'key' => 'ecommerce_store_name',
                'value' => 'Shopwise',
            ],
            [
                'key' => 'ecommerce_store_phone',
                'value' => '123-456-7890',
            ],
            [
                'key' => 'ecommerce_store_address',
                'value' => '123 Street, Old Trafford',
            ],
            [
                'key' => 'New York',
                'value' => 'Singapore',
            ],
            [
                'key' => 'New York',
                'value' => 'Singapore',
            ],
            [
                'key' => 'ecommerce_store_country',
                'value' => 'US',
            ],
            [
                'key' => 'ecommerce_is_enabled_support_digital_products',
                'value' => '1',
            ],
        ]);

        Slug::where('reference_type', Post::class)->update(['prefix' => 'news']);
        Slug::where('reference_type', Category::class)->update(['prefix' => 'news']);
        Slug::where('reference_type', Tag::class)->update(['prefix' => 'tags']);
    }
}
