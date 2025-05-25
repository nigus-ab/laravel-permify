<?php

namespace Permify\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Permify\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of roles.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $roles = Role::all();

        return view('permify::roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new role.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('permify::roles.create');
    }

    /**
     * Store a newly created role in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name',
        ]);

        Role::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('permify.roles.index')
            ->with('success', 'Role created successfully.');
    }
}
