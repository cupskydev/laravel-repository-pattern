<?php

namespace App\Exceptions;

use App\Trait\ResponseFormatTrait;
use Exception;
use Illuminate\Http\Response;

class FailedException extends Exception
{
    use ResponseFormatTrait;

    public function render()
    {
        $code = $this->getCode() == 0 ? Response::HTTP_INTERNAL_SERVER_ERROR : $this->getCode();
        return $this->responseFormat(status: $code, message: $this->getMessage());
    }
}
