<?php

namespace App\Traits;

trait ApiResponser
{
    public function successResponse($data, $code = 200)
    {
        return response()->json([
            'data' => $data,
        ], $code);
    }

    public function errorResponse($message, $code = 400)
    {
        return response()->json([
            'message' => $message,
            'errorCode' => $code,
        ], $code);
    }


}
