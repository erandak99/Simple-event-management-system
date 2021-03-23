<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Services\EventService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;


class StaffController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the staff micro-service
     * @var EventService
     */
    public $eventService;

    /**
     *  The service to consume the staff micro-service
     * @var $eventService;
     */
    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    /**
     * Add event
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request)
    {
        return $this->successResponse($this->eventService->addEvent($request->all()));
    }

    /**
     * Assign staff member
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function assign(Request $request)
    {
        return $this->successResponse($this->eventService->assignBranch($request->all()));
    }

    /* get event details with relevent staff */
    public function getEvent($id, Request $request)
    {
        return $this->successResponse($this->eventService->getEventDetails($id));
    }
}
