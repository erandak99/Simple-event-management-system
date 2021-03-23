<?php

namespace App\Http\Controllers\Staff;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffController extends Controller
{

    /****** Get all staff details *******/
    public function showAllStaffs()
    {
        return response()->json(Staff::all());
    }

    /****** Get staff details by id *******/
    public function showOneStaff($id)
    {
        return response()->json(Staff::find($id));
    }

    /****** Add staff member *******/
    public function add(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|string',
            'nic'       => 'required|max:12',
            'contactNo' => 'required|numeric|digits:10',
            'email'     => 'required|email|unique:staff',
        ]);

        $Staff = Staff::create($request->all());

        return response()->json($Staff, 201);
    }

    /****** Delete staff member by id *******/
    public function delete($id)
    {
        Staff::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }

    /* assign staff member to branch */
    public function assign(Request $request)
    {
        $Staff = Staff::findOrFail($request['staffId']);
        $Staff->update($request->all());

        return response()->json($Staff, 200);
    }
}
