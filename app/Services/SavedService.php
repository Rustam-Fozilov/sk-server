<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\University;

class SavedService
{
    public function save(array $params)
    {
        $id = $params['saveable_id'];
        $type = $params['saveable_type'];

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

        return auth()->user()->savedItems()->create([
            'saveable_id' => $id,
            'saveable_type' => $type,
        ]);
    }
}
