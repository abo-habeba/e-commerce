<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::all()->load('company');
        return response()->json($branches);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|unique:branches,name',
                'email' => 'required|email|unique:branches,email',
                'description' => 'nullable|string',
                'address' => 'required|string',
                'phone' => 'required',
                'Company_id' => 'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json($validator->errors());
        };
        // $request->validate([
        //     'name' => 'required|string|unique:branches,name',
        //     'email' => 'required|email|unique:branches,email',
        //     'description' => 'nullable|string',
        //     'address' => 'required|string',
        //     'phone' => 'required|integer',
        //     'Company_id' => 'required',
        // ]);

        $branch = Branch::create($request->all());
        return response()->json($branch);

    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {

        return response()->json($branch->load('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $branch)
    {
        return $request;

        // $branch->update($request->all());
        // return response()->json($branch);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();
    }
}