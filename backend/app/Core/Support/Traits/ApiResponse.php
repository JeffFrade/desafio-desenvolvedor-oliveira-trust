<?php

namespace App\Core\Support\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    /**
     * @param mixed $data
     * @param string $message
     * @return JsonResponse
     */
    protected function successResponse($data, string $message = '')
    {
        return response()->json([
            'data' => $data,
            'message' => $message
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
        ], $httpStatus);
    }
}
