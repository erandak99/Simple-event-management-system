<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{

    /****** Get all branch details *******/
    public function showAllBranchs()
    {
        return response()->json(Branch::all());
    }

    /****** Get branch details by id *******/
    public function showOneBranch($id)
    {
        return response()->json(Branch::find($id));
    }

    /****** Add branch *******/
    public function add(Request $request)
    {
        $this->validate($request, [
            'name'       => 'required',
            'branchCode' => 'required|unique:branches',
        ]);

        $Branch = Branch::create($request->all());

        return response()->json($Branch, 201);
    }

    /****** Update branch Details by id *******/
    public function update($id, Request $request)
    {
        $Branch = Branch::findOrFail($id);
        $Branch->update($request->all());

        return response()->json($Branch, 200);
    }

    /****** Delete branch by id *******/
    public function delete($id)
    {
        Branch::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}
