<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class EventService
{
    use ConsumeExternalService;

    /**
     * The base uri to consume event service
     * @var string
     */
    public $baseUri;

    /**
     * Authorization secret to pass to event api
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = env('EVENT_SERVICE_BASE_URL');
    }

    public function addEvent($data)
    {
        return $this->performRequest('POST', '/event/add', $data);
    }

    public function assignBranch($data)
    {
        return $this->performRequest('POST', '/event/assign', $data);
    }

    public function getEventDetails($id)
    {
        return $this->performRequest('GET', "/event/detail/{$id}");
    }
}
