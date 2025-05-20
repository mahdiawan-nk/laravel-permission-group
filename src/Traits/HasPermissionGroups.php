<?php

namespace Custom\PermissionGroup\Traits;

use Custom\PermissionGroup\Models\Role;
use Custom\PermissionGroup\Models\Permission;

trait HasPermissionGroups
{
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function hasRole($roleName): bool
    {
        return $this->roles->contains('name', $roleName);
    }

    public function hasPermission(string $permissionName): bool
    {
        foreach ($this->roles as $role) {
            if ($role->permissions->contains('name', $permissionName)) {
                return true;
            }
        }
        return false;
    }
}