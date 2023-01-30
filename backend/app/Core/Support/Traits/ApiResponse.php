<?php

namespace App\Core\Support\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    /**
     * @param mixed $data
     * @return JsonResponse
     */
    protected function successResponse($data)
    {
        return response()->json([
            'data' => $data
        ], 200);
    }

    /**
     * @param \Exception $e
     * @param int $httpStatus
     * @return JsonResponse
     */
    protected function errorResponse(\Exception $e, int $httpStatus = 500)
    {
        return response()->json([
            'message' => $e->getMessage(),
            'code' => $e->getCode(),
            'trace' => $e->getTrace()
        ], $httpStatus);
    }
}
