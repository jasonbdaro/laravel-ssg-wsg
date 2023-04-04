<?php

namespace Jasonbdaro\Ssgwsg\Resources;

use Jasonbdaro\Ssgwsg\Resources\BaseResource;

class Enrolment extends BaseResource
{
    const POST_ENROLMENT = '/tpg/enrolments';
    const POST_UPDATE_ENROLMENT = '/tpg/enrolments/details/{referenceNumber}';
    const POST_SEARCH_ENROLMENT = '/tpg/enrolments/search';
    const GET_VIEW_ENROLMENT = '/tpg/enrolments/details/{referenceNumber}';
    const POST_UPDATE_FEE = '/tpg/enrolments/feeCollections/{referenceNumber}';

    public function create(array $body)
    {
        return parent::postEnrolment($body);
    }

    public function update(string $id, array $query)
    {
        return parent::postUpdateEnrolment($id, $query);
    }

    public function search($body)
    {
        return parent::postSearchEnrolment($body);
    }

    public function view(string $id)
    {
        return parent::getViewEnrolment($id);
    }

    public function updateFee(string $id, $body)
    {
        return parent::postUpdateFee($id, $body);
    }
}
