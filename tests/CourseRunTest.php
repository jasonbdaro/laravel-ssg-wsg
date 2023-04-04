<?php

namespace Jasonbdaro\Ssgwsg\Tests;

use Jasonbdaro\Ssgwsg\Facades\Ssgwsg;

class CourseRunTest extends BaseTestCase
{
    /** @test */
    public function it_can_create_course_run()
    {
        $data = Ssgwsg::courseRun()->create([]);
        $this->assertNotEmpty($data);
    }
}
