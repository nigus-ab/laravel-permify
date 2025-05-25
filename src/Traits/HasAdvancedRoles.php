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
     * The permissions that belong directly to the user (optional).
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_user');
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
        $this->roles()->syncWithoutDetaching($role->id);

        return $this;
    }

    /**
     * Check if user has a permission by name (either directly or via roles).
     */
    public function hasPermission(string $permissionName): bool
    {
        // Check direct permissions
        if ($this->permissions()->where('name', $permissionName)->exists()) {
            return true;
        }

        // Check permissions via roles
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
        $permission = Permission::firstOrCreate(['name' => $permissionName]);
        $this->permissions()->syncWithoutDetaching($permission->id);

        return $this;
    }
}
