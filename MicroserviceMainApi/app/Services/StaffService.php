<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;
use Illuminate\Http\JsonResponse;
use Config;

class StaffService
{
    use ConsumeExternalService;

    /**
     * The base uri to consume staff service
     * @var string
     */
    public $baseUri;

    /**
     * Authorization secret to pass to staff api
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = env('BRANCH_SERVICE_BASE_URL');
    }

    public function addStaff($data)
    {
        return $this->performRequest('POST', '/staff/add', $data);
    }

    public function assignStaff($data)
    {
        return $this->performRequest('POST', '/staff/assign', $data);
    }
}
