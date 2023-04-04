<?php

namespace Jasonbdaro\Ssgwsg\Resources;

use Jasonbdaro\Ssgwsg\Resources\BaseResource;

class Assessment extends BaseResource
{
    const POST_ASSESSMENT = '/tpg/assessments';
    const POST_UPDATE_ASSESSMENT = '/tpg/assessments/details/{referenceNumber}';
    const POST_SEARCH_ASSESSMENT = '/tpg/assessments/search';
    const GET_VIEW_ASSESSMENT = '/tpg/assessments/details/{referenceNumber}';

    public function create(array $body)
    {
        return parent::postAssessment($body);
    }

    public function update(string $id, $body)
    {
        return parent::postUpdateAssessment($id, $body);
    }

    public function search($body)
    {
        return parent::postSearchAssessment($body);
    }

    public function view(string $id)
    {
        return parent::getViewAssessment($id);
    }
}
