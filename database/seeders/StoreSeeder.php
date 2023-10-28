<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sellerIds = User::seller()->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            \App\Models\Store::factory()->create(
                [
                    'seller_id' => $sellerIds[array_rand($sellerIds)]
                ]
            );
        }
    }
}
