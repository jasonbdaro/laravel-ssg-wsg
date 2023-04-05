<?php

namespace Jasonbdaro\Ssgwsg\Tests;

use Jasonbdaro\Ssgwsg\Facades\Ssgwsg;

class CourseRunTest extends BaseTestCase
{
    /** @test */
    public function course_creation_expects_200_http_status_code()
    {
        $data = Ssgwsg::courseRun()->create([]);
        $this->assertEquals(200, $data['status']);
    }
}
