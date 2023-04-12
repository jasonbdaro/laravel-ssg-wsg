<?php

namespace Jasonbdaro\Ssgwsg\Resources;

use Jasonbdaro\Ssgwsg\Resources\BaseResource;

class Attendance extends BaseResource
{
    const POST_COURSE_RUN_SESSION_ATTENDANCE = '/courses/runs/{runId}/sessions/attendance';
    const GET_COURSE_RUN_SESSION_ATTENDANCE = '/courses/runs/{runId}/sessions/attendance';

    public function create(int $id, array $body)
    {
        return parent::postCourseRunSessionAttendance($id, $body);
    }

    public function attendance(int $id, $query = [])
    {
        return parent::getCourseRunSessionAttendance($id, $query);
    }
}
