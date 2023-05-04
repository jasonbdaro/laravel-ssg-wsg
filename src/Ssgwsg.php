<?php

namespace Jasonbdaro\Ssgwsg;

use Jasonbdaro\Ssgwsg\Resources\CourseRun;
use Jasonbdaro\Ssgwsg\Resources\Enrolment;
use Jasonbdaro\Ssgwsg\Resources\Assessment;
use Jasonbdaro\Ssgwsg\Resources\Attendance;

class Ssgwsg
{
    public function courseRun()
    {
        return new CourseRun;
    }
    
    public function attendance()
    {
        return new Attendance;
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
