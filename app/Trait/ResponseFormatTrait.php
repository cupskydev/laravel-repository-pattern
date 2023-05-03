<?php

namespace App\Trait;

/**
 * This Function is only for formating API response to JSON only
 */
trait ResponseFormatTrait
{
    public function responseFormat(?int $status = 200, ?string $message = "OK", mixed $data = [])
    {
        return response()->json([
            "message" => $message,
            "data"    => $data
        ], $status);
    }
}
