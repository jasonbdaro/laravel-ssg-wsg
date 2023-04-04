<?php

namespace Jasonbdaro\Ssgwsg;

use Jasonbdaro\Ssgwsg\Resources\CourseRun;
use Jasonbdaro\Ssgwsg\Resources\Enrolment;
use Jasonbdaro\Ssgwsg\Resources\Assessment;

class Ssgwsg
{
    public function courseRun()
    {
        return new CourseRun;
    }

    public function enrolment()
    {
        return new Enrolment;
    }

    public function assessment()
    {
        return new Assessment;
    }
}
