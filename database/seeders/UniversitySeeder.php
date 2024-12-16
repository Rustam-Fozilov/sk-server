<?php

namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    public static string $model = University::class;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        University::factory()->count(10)->create();
    }
}
