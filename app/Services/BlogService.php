<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BlogService
{
    public function list(array $params): LengthAwarePaginator
    {
        return Blog::with(['tags'])
            ->when(isset($params['search']), function ($query) use ($params) {
                $query->where('title', 'like', '%' . $params['search'] . '%');
            })
            ->orderByDesc('id')
            ->paginate($params['per_page'] ?? 15);
    }

    public function show(int $id): Blog
    {
        return (new CheckService())->checkById(Blog::with(['tags']), $id);
    }
}
