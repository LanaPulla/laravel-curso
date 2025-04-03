<?php 

namespace App\Adapters;

use App\Http\Resources\DefaultResource;
use App\Repositories\PaginationInterface;

class ApiAdapter {
    public static function toJson(PaginationInterface $data)
    {
        return DefaultResource::collection($data->items())->additional([
            'meta' => [
                'total' => $data->total(),
                'if_first_page' => $data->ifFirstPage(),
                'if_last_page' => $data->ifLastPage(),
                'current_page' => $data->currentPage(),
                'next_page' => $data->getNumberNextPage(),
                'previous_page' => $data->getNumberPreviousPage(),
            ]
        ]);
    }
}
