<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class Json
{
    /**
     * Create a new JSON success response instance.
     *
     * @param string $message
     * @param int $options
     */
    public static function success(mixed $data = [], string $message = null, int $status = 200, array $headers = [], $options = 0): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data,
        ], $status, $headers, $options);
    }

    /**
     * Create a new JSON error response instance.
     *
     * @param string $message
     */
    public static function error(mixed $errors = [], string $message = null, int $code = 422): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors'  => $errors,
        ], $code);
    }
}
