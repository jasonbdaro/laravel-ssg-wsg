<?php

namespace Jasonbdaro\Ssgwsg\Exceptions;

use Exception;
use Throwable;

class UndefinedConstantException extends Exception
{
    public function __construct(
        $message = 'The constant is undefined.',
        $code = 500,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
