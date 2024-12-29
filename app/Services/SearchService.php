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
                ->orWhere('address', 'like', '%' . $search . '%')
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

    public function searchHistoryList(array $params)
    {
        return auth()->user()->searchHistory()->paginate($params['per_page'] ?? 15);
    }

    public function addSearchHistory(array $params)
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

        return auth()->user()->searchHistory()->updateOrCreate(
            [
                'searchable_id' => $id,
                'searchable_type' => $type,
            ],
            [
                'searched_at' => now(),
            ]
        );
    }

    public function deleteSearchHistory(array $params)
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

        return auth()->user()->searchHistory()->where([
            'user_id' => auth()->id(),
            'searchable_id' => $id,
            'searchable_type' => $type,
        ])->delete();
    }
}
