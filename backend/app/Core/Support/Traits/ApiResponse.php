<?php

namespace App\Core\Support\Traits;

trait ApiResponse
{
    protected function successResponse($data)
    {
        return response()->json([
            'data' => $data
        ], 200);
    }
}
