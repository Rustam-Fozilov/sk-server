<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public array $once_seeders = [
        UniversitySeeder::class,
        UserSeeder::class,
        TelegraphBotSeeder::class,
        TelegraphChatSeeder::class,
        TagSeeder::class,
        BlogSeeder::class,
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
