<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BlogService
{
    public function list(array $params): LengthAwarePaginator
    {
        $user = auth('sanctum')->user();
        $blogs = Blog::with(['tags'])
            ->when(isset($params['search']), function ($query) use ($params) {
                $query->where('title', 'like', '%' . $params['search'] . '%');
            })
            ->when(isset($params['tag']), function ($query) use ($params) {
                $query->whereRelation('tags', 'tag_id', '=', $params['tag']);
            })
            ->orderByDesc('id')
            ->paginate($params['per_page'] ?? 15);

            
        if (!is_null($user)) {
            $blogs->getCollection()->transform(function ($item) use ($user) {
                $item->is_saved = $user->savedItems()
                    ->where('saveable_type', Blog::class)
                    ->where('saveable_id', $item->id)
                    ->exists();
                return $item;
            });
        }

        return $blogs;
    }

    public function show(int $id): Blog
    {
        $blog = (new CheckService())->checkById(Blog::with(['tags']), $id);
        $user = auth('sanctum')->user();
        if (!is_null($user)) {
            $blog->is_saved = $user->savedItems()
                ->where('saveable_type', Blog::class)
                ->where('saveable_id', $blog->id)
                ->exists();

            $blog->is_liked = $user->likedItems()
                ->where('likeable_type', Blog::class)
                ->where('likeable_id', $blog->id)
                ->exists();
        }

        $blog->like_count = $blog->likes()->count();
        return $blog;
    }

    public function latest()
    {
        return Blog::with(['tags'])->orderByDesc('id')->first();
    }
}
