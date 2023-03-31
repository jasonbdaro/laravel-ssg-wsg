<?php

namespace Jasonbdaro\Ssgwsg\Tests;

use Jasonbdaro\Ssgwsg\Facades\Ssgwsg;
use Jasonbdaro\Ssgwsg\Exceptions\UndefinedConstantException;

class SsgwsgTest extends BaseTestCase
{
    /** @test */
    public function it_will_throw_an_exception_if_constant_is_undefined()
    {
        $this->expectException(UndefinedConstantException::class);
        Ssgwsg::someUndefinedMethod();
    }
}
