<?php

namespace App\Traits;

trait ResponseHelperTrait
{

    public function successResponse($data = []): array
    {
        return [
            'status' => true,
            'data' => $data
        ];
    }

}
