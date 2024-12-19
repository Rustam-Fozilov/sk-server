<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\University;

class SearchService
{
    public function search(array $params): array
    {
        $search = $params['search'] ?? null;
        if (!is_null($search)) {
            $universities = University::query()
                ->where('name', 'like', '%' . $search . '%')
                ->get();

            $blogs = Blog::query()
                ->where('title', 'like', '%' . $search . '%')
                ->get();
        }

        return [
            'universities' => $universities ?? [],
            'blogs' => $blogs ?? [],
        ];
    }

    public function save(array $params)
    {
        $type = $params['searchable_type'];
        $id = $params['searchable_id'];

        switch ($type) {
            case 'university':
                (new CheckService())->checkById(University::query(), $id);
                $type = University::class;
                break;
            case 'blog':
                (new CheckService())->checkById(Blog::query(), $id);
                $type = Blog::class;
                break;
            default:
                throwError('Invalid type');
        }

        return auth()->user()->searchHistory()->create([
            'searchable_id' => $id,
            'searchable_type' => $type,
        ]);
    }
}
