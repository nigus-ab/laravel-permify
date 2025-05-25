<?php

namespace Permify\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    protected $fillable = ['name', 'label'];

    /**
     * The permissions that belong to the role.
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }

    /**
     * The users that belong to the role.
     */
    public function users(): BelongsToMany
    {
        // Note: assumes your User model is in App\Models\User
        return $this->belongsToMany(config('auth.providers.users.model'), 'role_user');
    }
}
