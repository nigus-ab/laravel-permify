<?php

namespace Permify\Traits;

use Permify\Models\Role;
use Permify\Models\Permission;

trait HasAdvancedRoles
{
    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    /**
     * Check if user has a role by name.
     */
    public function hasRole(string $roleName): bool
    {
        return $this->roles()->where('name', $roleName)->exists();
    }

    /**
     * Assign role to user.
     */
    public function assignRole(string $roleName)
    {
        $role = Role::firstOrCreate(['name' => $roleName]);
        $this->roles()->syncWithoutDetaching($role);
    }

    /**
     * Check if user has a permission by name.
     */
    public function hasPermission(string $permissionName): bool
    {
        foreach ($this->roles as $role) {
            if ($role->permissions()->where('name', $permissionName)->exists()) {
                return true;
            }
        }
        return false;
    }

    /**
     * Give permission directly to user (optional).
     */
    public function givePermissionTo(string $permissionName)
    {
        $permission = Permission::where('name', $permissionName)->firstOrFail();
        $this->permissions()->syncWithoutDetaching($permission);
    }
}
