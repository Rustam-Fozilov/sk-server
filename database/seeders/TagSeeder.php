<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public static string $model = Tag::class;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::query()->create(['name' => 'Study']);
        Tag::query()->create(['name' => 'Masters']);
        Tag::query()->create(['name' => 'Scholarship']);
    }
}
