<?php

namespace Permify\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Permify\Models\Role;
use Permify\Models\Permission;
use Tests\TestCase;
use App\Models\User;

class PermissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_has_permission_via_role()
    {
        $user = User::factory()->create();
        $role = Role::create(['name' => 'editor']);
        $permission = Permission::create(['name' => 'edit_post']);

        $role->permissions()->attach($permission);
        $user->roles()->attach($role);

        $this->assertTrue($user->hasPermission('edit_post'));
    }
}
