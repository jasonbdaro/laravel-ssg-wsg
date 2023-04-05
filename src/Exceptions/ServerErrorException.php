<?php

namespace Jasonbdaro\Ssgwsg\Exceptions;

use Exception;
use Throwable;

class ServerErrorException extends Exception
{
    public function __construct(
        $message = 'Internal Server Error.',
        $code = 500,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
