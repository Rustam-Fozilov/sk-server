<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public static string $model = Blog::class;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = Blog::factory(10)->create();
        $tags = Tag::all();

        $blogs->each(function ($blog) use ($tags) {
            $blog->tags()->attach($tags->random(rand(1, 3))->pluck('id')->toArray());
        });
    }
}
