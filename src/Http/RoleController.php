<?php

namespace Permify\Http\Controllers;

use Permify\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('permify::roles.index', compact('roles'));
    }
}
