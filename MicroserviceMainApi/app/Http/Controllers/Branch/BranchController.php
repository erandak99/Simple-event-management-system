<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use App\Services\BranchService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;


class BranchController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the branch micro-service
     * @var BranchService
     */
    public $branchService;

    /**
     *  The service to consume the branch micro-service
     * @var $branchService;
     */
    public function __construct(BranchService $branchService)
    {
        $this->branchService = $branchService;
    }

    /**
     * Add branch
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request)
    {
        return $this->successResponse($this->branchService->addBranch($request->all()));
    }

    /**
     * Assign branch
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function assign(Request $request)
    {
        return $this->successResponse($this->branchService->assignBranch($request->all()));
    }
}
