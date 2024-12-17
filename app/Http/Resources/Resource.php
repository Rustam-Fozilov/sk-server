<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Resource extends ResourceCollection
{
    protected array $appends;

    /**
     * @param $resource
     * @param array $requestFilter requestda kelgan ma'lumotlar
     * @param string|array $appends
     */
    public function __construct(
        $resource,
        protected array $requestFilter = [],
        string|array $appends = [],
    )
    {
        if (is_string($appends)) $appends = [$appends];
        $this->appends = $appends;
        parent::__construct($resource);
    }


    public function toArray($request): array
    {
        $data = $this->collection;

        if (!empty($this->appends)) $data = $data->setAppends($this->appends);

        return [

            'data' => $data,

            'pagination' => [

                'total' => $this->total(),
                'count' => $this->count(),
                'per_page' => $this->perPage(),
                'current_page' => $this->currentPage(),
                'total_pages' => $this->lastPage(),
            ],

            'filter' => $this->requestFilter,
        ];
    }

    public function paginationInformation(): array
    {
        return [];
    }
}
