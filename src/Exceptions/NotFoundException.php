<?php

namespace Jasonbdaro\Ssgwsg\Exceptions;

use Exception;
use Throwable;

class NotFoundException extends Exception
{
    public function __construct(
        $message = 'Not Found.',
        $code = 404,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
