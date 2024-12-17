<?php

namespace App\Services;

use App\Models\University;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UniversityService
{
    public function all(array $params): LengthAwarePaginator
    {
        return University::query()
            ->when(isset($params['search']), function ($query) use ($params) {
                $query->where('name', 'like', '%' . $params['search'] . '%');
            })
            ->paginate($params['per_page'] ?? 15);
    }

    public function show(int $id)
    {
        return University::query()->findOr($id, function () {
            throwError('University not found', 404);
        });
    }
}
