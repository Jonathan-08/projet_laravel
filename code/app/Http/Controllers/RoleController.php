<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::select(['id','name'])
        ->withCount('users')
        ->get();

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("roles.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => ['required', 'string', 'max:80']
        ]);

        Role::create([
            "name" => $request->name,
        ]);

        return to_route("roles.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $role->load('users')
        ->loadCount('users');
        return view("roles.show", compact("role"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view("roles.edit", compact("role"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            "name" => ["required", "string", "max:80"]
        ]);

        $role->update([
            "name" => $request->name
        ]);

        return to_route("roles.show", compact("role"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return to_route("roles.index");
    }
}
