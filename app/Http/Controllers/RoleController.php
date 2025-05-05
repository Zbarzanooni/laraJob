<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Services\ResultService;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        $users = User::all();
        return view('roles.create',compact('permissions','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'permission_id'=>'required',
            'user_id'=>'required',
        ]);
        try {
            if ($request) {
                $role = Role::create([
                    'name' => $request->name,
                    'description' => $request->description
                ]);
                $role->permissions()->sync(array_values($request->permission_id));
                $role->users()->sync(array_values($request->user_id));
                return $role;
            }
        }catch (Exception $exception){
                app()[ExceptionHandler::class]->report($exception);
                return $exception->getMessage();
            }


    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
       return view('roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
