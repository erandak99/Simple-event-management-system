<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{

    public function showAllBranchs()
    {
        return response()->json(Branch::all());
    }

    public function showOneBranch($id)
    {
        return response()->json(Branch::find($id));
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'name'       => 'required',
            'branchCode' => 'required|unique:Branch',
        ]);

        $Branch = Branch::create($request->all());

        return response()->json($Branch, 201);
    }

    public function update($id, Request $request)
    {
        $Branch = Branch::findOrFail($id);
        $Branch->update($request->all());

        return response()->json($Branch, 200);
    }

    public function delete($id)
    {
        Branch::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}