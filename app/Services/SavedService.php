<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\University;

class SavedService
{
    public function list(array $params)
    {
        $data = auth()->user()->savedItems()->paginate($params['per_page'] ?? 15);

        $data->getCollection()->transform(function ($item) {
            $item->saveable->is_saved = true;
            $item->saveable->saveable_type = $item->saveable_type === University::class ? 'university' : 'blog';
            return $item->saveable;
        });
        return $data;
    }

    public function add(array $params)
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

        return auth()->user()->savedItems()->firstOrCreate(
            [
                'saveable_id' => $id,
                'saveable_type' => $type,
            ],
            [
                'saveable_id' => $id,
                'saveable_type' => $type,
            ]
        );
    }

    public function delete(array $params)
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

        return auth()->user()->savedItems()->where([
            'saveable_id' => $id,
            'saveable_type' => $type,
        ])->delete();
    }
}
