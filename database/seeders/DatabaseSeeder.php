<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public array $once_seeders = [
        UniversitySeeder::class,
    ];

    public function run(): void
    {
        $this->seedOnce();
    }

    public function seedOnce(): void
    {
        $seeders = [];

        foreach ($this->once_seeders as $seed) {
            if (isset($seed::$model) && (!$seed::$model::first())) $seeders[] = $seed;
        }

        if (!empty($seeders)) $this->call($seeders);
    }
}
