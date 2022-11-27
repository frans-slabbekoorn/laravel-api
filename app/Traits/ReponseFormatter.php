<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ResponseFormatter
{
    /**
     * Create a new JSON success response instance.
     *
     * @param  mixed  $data
     * @param  int  $status
     * @param  array  $headers
     * @param  int  $options
     * @return \Illuminate\Http\JsonResponse
     */
    protected static function success(mixed $data = [], string $message = null, int $status = 200, array $headers = [], $options = 0): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $status, $headers, $options);
    }

    protected function error(mixed $errors = [], string $message = null, int $code = 422): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors,
        ], $code);
    }
}
