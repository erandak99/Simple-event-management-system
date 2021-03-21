<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EventController extends Controller
{

    /****** Get all event details *******/
    public function showAllEvents()
    {
        return response()->json(Event::all());
    }

    /****** Get event details by id *******/
    public function showOneEvent($id)
    {
        return response()->json(Event::find($id));
    }

    /****** Add event *******/
    public function add(Request $request)
    {
        $this->validate($request, [
            'name'       => 'required',
            'startDate'  => 'required|date',
            'endDate'    => 'required|date',
            'branchCode' => 'required',
            'status'     => 'required|boolean'
        ]);

        $Event = Event::create($request->all());

        return response()->json($Event, 201);
    }

    /****** Delete event by id *******/
    public function delete($id)
    {
        Event::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }

    /* get event details with relevent staff */
    public function getEvent($id, Request $request)
    {
        $data = DB::table('events')
            ->join('staff', 'events.branchCode', '=', 'staff.branchCode')
            ->join('branches', 'events.branchCode', '=', 'branches.branchCode')
            ->select('events.name AS Event', 'events.startDate AS Event Start Date', 'events.endDate AS Event End Date', 'staff.name as Employee Name', 'branches.name AS Branch Name')
            ->groupBy('events.name', 'events.startDate', 'events.endDate', 'staff.name', 'branches.name')
            ->get();

        return response()->json($data, 200);
    }
}
