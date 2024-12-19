<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public static string $model = User::class;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (env('ADMIN_PASSWORD') && env('ADMIN_PHONE')) {
            User::query()->create([
                'name' => 'Admin',
                'phone' => env('ADMIN_PHONE'),
                'is_admin' => true,
                'password' => env('ADMIN_PASSWORD'),
            ]);
        }
    }
}
