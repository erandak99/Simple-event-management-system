<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{

    public function showAllStaffs()
    {
        return response()->json(Staff::all());
    }

    public function showOneStaff($id)
    {
        return response()->json(Staff::find($id));
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required|email|unique:staff',
        ]);

        $Staff = Staff::create($request->all());

        return response()->json($Staff, 201);
    }

    public function update($id, Request $request)
    {
        $Staff = Staff::findOrFail($id);
        $Staff->update($request->all());

        return response()->json($Staff, 200);
    }

    public function delete($id)
    {
        Staff::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}