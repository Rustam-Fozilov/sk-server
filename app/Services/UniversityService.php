<?php

namespace App\Services;

use App\Models\University;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UniversityService
{
    public function all(array $params): LengthAwarePaginator
    {
        $user = auth('sanctum')->user();
        $unis = University::query()
            ->when(isset($params['search']), function ($query) use ($params) {
                $query->where('name', 'like', '%' . $params['search'] . '%')
                    ->orWhere('address', 'like', '%' . $params['search'] . '%');
            })
            ->orderByDesc('id')
            ->paginate($params['per_page'] ?? 15);

        if (!is_null($user)) {
            $unis->getCollection()->transform(function ($item) use ($user) {
                $item->is_saved = $user->savedItems()
                    ->where('saveable_type', University::class)
                    ->where('saveable_id', $item->id)
                    ->exists();
                return $item;
            });
        }

        return $unis;
    }

    public function show(int $id)
    {
        $uni = (new CheckService())->checkById(University::query(), $id);
        $user = auth('sanctum')->user();
        if (!is_null($user)) {
            $uni->is_saved = $user->savedItems()
                ->where('saveable_type', University::class)
                ->where('saveable_id', $uni->id)
                ->exists();

            $uni->is_liked = $user->likedItems()
                ->where('likeable_type', University::class)
                ->where('likeable_id', $uni->id)
                ->exists();
        }

        $uni->like_count = $uni->likes()->count();
        return $uni;
    }
}
