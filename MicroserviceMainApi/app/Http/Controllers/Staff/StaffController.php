<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Services\StaffService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;


class StaffController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the staff micro-service
     * @var StaffService
     */
    public $staffService;

    /**
     *  The service to consume the staff micro-service
     * @var $staffService;
     */
    public function __construct(StaffService $staffService)
    {
        $this->staffService = $staffService;
    }

    /**
     * Add staff member
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request)
    {
        return $this->successResponse($this->staffService->addStaff($request->all()));
    }

    /**
     * Assign staff member
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function assign(Request $request)
    {
        return $this->successResponse($this->staffService->assignStaff($request->all()));
    }
}
