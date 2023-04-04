<?php

namespace Jasonbdaro\Ssgwsg\Resources;

use Jasonbdaro\Ssgwsg\Resources\BaseResource;

class CourseRun extends BaseResource
{
    const POST_COURSE_RUN = '/courses/courseRuns/publish';
    const GET_COURSE_RUN = '/courses/courseRuns/id/{runId}';
    const POST_DELETE_COURSE_RUN = '/courses/runs/{courseRunId}';
    const POST_COURSE_RUN_SESSION_ATTENDANCE = '/courses/runs/{runId}/sessions/attendance';
    const GET_COURSE_RUN_SESSIONS = '/courses/runs/{runId}/sessions';
    const GET_COURSE_RUN_SESSION_ATTENDANCE = '/courses/runs/{runId}/sessions/attendance';

    public function create(array $body)
    {
        return parent::postCourseRun($body);
    }

    public function get(int $id, array $query = [])
    {
        return parent::getCourseRun($id, $query);
    }

    public function delete(string $id, array $body)
    {
        return parent::postDeleteCourseRun($id, $body);
    }

    public function uploadAttendance(int $id, array $body)
    {
        return parent::postCourseRunSessionAttendance($id, $body);
    }

    public function getSessions(int $id, $query = [])
    {
        return parent::getCourseRunSessions($id, $query);
    }

    public function getSessionAttendance(int $id, $query = [])
    {
        return parent::getCourseRunSessionAttendance($id, $query);
    }
}
