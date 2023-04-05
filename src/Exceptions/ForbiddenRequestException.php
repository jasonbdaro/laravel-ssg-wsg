<?php

namespace Jasonbdaro\Ssgwsg\Exceptions;

use Exception;
use Throwable;

class ForbiddenRequestException extends Exception
{
    public function __construct(
        $message = 'Access to this API has been disallowed.',
        $code = 403,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
