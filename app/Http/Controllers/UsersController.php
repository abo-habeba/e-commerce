<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'firstName' => 'required|string',
                'lastName' => 'required|string',
                'email'  => 'required|email|unique:users,email',
                'phone' => 'required|unique:users,phone',
                'address' => 'required|string',
                'password' => 'required|string',
                'status' => 'required|boolean',
                'create_by' => 'required|integer',
                'branch_id' => 'required|integer',
            ]
        );
        if ($validator->fails()) {
            return response()->json($validator->errors());
        };

        try {
            
            $user = User::create($request->all());
            return response()->json($user);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        try {
            
            return response()->json($user);
            
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'firstName' => 'required|string',
                'lastName' => 'required|string',
                'email'  => 'required|email|unique:users,email',
                'phone' => 'required|unique:users,phone',
                'address' => 'required|string',
                'password' => 'required|string',
                'status' => 'required|boolean',
                'create_by' => 'required|integer',
                'branch_id' => 'required|integer',
            ]
        );
        if ($validator->fails()) {
            return response()->json($validator->errors());
        };

        try {
            
            $user->update($request->all());
            return response()->json($user);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            
            $user->delete();
            return true;
            
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}