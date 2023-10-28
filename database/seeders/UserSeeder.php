<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enums\UserTypes;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [UserTypes::ADMIN->value , UserTypes::CUSTOMER->value, UserTypes::SELLER->value ];

        for ($i = 0; $i < 10; $i++) {
            User::factory()->create([
                'type' => $types[array_rand($types)],
                'password' => 'password',
            ]);
        }

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => 'admin2023',
            'type' => 'admin',
        ]);
    }
}
