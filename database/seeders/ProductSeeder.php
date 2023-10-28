<?php

namespace Database\Seeders;

use App\Models\Store;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $storesIds = Store::pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            \App\Models\Product::factory()->create(
                [
                    'store_id' => $storesIds[array_rand($storesIds)]
                ]
            );
        }
    }
}
