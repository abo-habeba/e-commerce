<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            
            $companies = Company::all()->load('branches');
            return response()->json($companies);
            
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
                'name' => 'required|string|unique:companies,name',
                'email' => 'required|email|unique:companies,email',
                'description' => 'nullable|string',
                'address' => 'required|string',
                'phone' => 'required|unique:companies,phone',
            ]
        );
        if ($validator->fails()) {
            return response()->json($validator->errors());
        };

        try {
            
            $company = Company::create($request->all());
            return response()->json($company);
            
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        try {
            
            return response()->json($company);
            
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|unique:companies,name',
                'email' => 'required|email|unique:companies,email',
                'description' => 'nullable|string',
                'address' => 'required|string',
                'phone' => 'required|unique:companies,phone',
            ]
        );
        if ($validator->fails()) {
            return response()->json($validator->errors());
        };
        try {
            
            $company->update($request->all());
            return response()->json($company);
            
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        try {
            
            $company->delete();
            return true;
            
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}