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
        try {

            $branches = Branch::all()->load('company');
            return response()->json($branches);
        } catch (\Exception $e) {

            return response()->json($e->getMessage());
        }
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

        try {

            $branch = Branch::create($request->all());
            return response()->json($branch);
        } catch (\Exception $e) {

            return response()->json($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        try {

            return response()->json($branch->load('company'));
        } catch (\Exception $e) {

            return response()->json($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $branch)
    {
        try {

            $branch->update($request->all());
            return response()->json($branch);
        } catch (\Exception $e) {

            return response()->json($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        try {

            $branch->delete();
            return true;
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}