<?php

namespace Jasonbdaro\Ssgwsg\Facades;

use Illuminate\Support\Facades\Facade;

class Ssgwsg extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ssgwsg';
    }
}
