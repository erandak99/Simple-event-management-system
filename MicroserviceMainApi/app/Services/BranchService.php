<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class BranchService
{
    use ConsumeExternalService;

    /**
     * The base uri to consume branch service
     * @var string
     */
    public $baseUri;

    /**
     * Authorization secret to pass to branch api
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.branch.base_uri');
        $this->secret = config('services.branch.secret');
    }

    public function addBranch()
    {
        return $this->performRequest('POST', '/branch/add');
    }

    public function assignBranch($data)
    {
        return $this->performRequest('POST', '/branch/assign', $data);
    }
}
