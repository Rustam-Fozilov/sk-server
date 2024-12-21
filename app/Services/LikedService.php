<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\University;

class LikedService
{
    public function list(array $params)
    {
        return auth()->user()->likedItems()->paginate($params['per_page'] ?? 15);
    }

    public function add(array $params)
    {
        $id = $params['likeable_id'];
        $type = $params['likeable_type'];

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

        return auth()->user()->likedItems()->firstOrCreate(
            [
                'likeable_id' => $id,
                'likeable_type' => $type,
            ],
            [
                'likeable_id' => $id,
                'likeable_type' => $type,
            ]
        );
    }

    public function delete(array $params)
    {
        $id = $params['likeable_id'];
        $type = $params['likeable_type'];

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

        return auth()->user()->likedItems()->where([
            'likeable_id' => $id,
            'likeable_type' => $type,
        ])->delete();
    }
}
