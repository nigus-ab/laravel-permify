<?php

namespace Permify\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Permify\Models\Role;
use Permify\Models\Permission;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalRoles = Role::count();
        $totalPermissions = Permission::count();
        $recentUsers = User::latest()->take(5)->get();

        // Role distribution: role name => user count
        $roleDistribution = Role::withCount('users')->get()->pluck('users_count', 'name');

        return view('permify.dashboard.index', compact(
            'totalUsers',
            'totalRoles',
            'totalPermissions',
            'recentUsers',
            'roleDistribution'
        ));
    }
}
