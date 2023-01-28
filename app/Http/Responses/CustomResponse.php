<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Response;

/**
 * This custom response class is an extension for the built in response().
 */
class CustomResponse extends Response
{
    public static function jsonSuccess($data = [], $status = 200)
    {
        $response = [
            'success' => true,
            'data'    => $data,
        ];

        return parent::json($response, $status);
    }
}
