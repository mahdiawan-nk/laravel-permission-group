<?php

namespace MahdiawanNK\PermissionGroup\Traits;

use MahdiawanNK\PermissionGroup\Models\Role;
use MahdiawanNK\PermissionGroup\Models\Permission;
use MahdiawanNK\PermissionGroup\Support\PermissionGroupCheck;
use Illuminate\Support\Collection;

trait HasPermissionGroups
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }


    public function getAllPermissions(): Collection
    {
        return $this->roles()
            ->with('permissions.group')
            ->get()
            ->flatMap(fn($role) => $role->permissions)
            ->merge($this->permissions()->with('group')->get())
            ->unique('id');
    }

    public function hasPermission(string $permissionName): bool
    {
        return $this->getAllPermissions()
            ->contains('name');
    }


    public function hasRole(string|array $roles): bool
    {
        return $this->roles
            ->whereIn('name', (array)$roles)
            ->isNotEmpty();
    }

    public function hasGroup(string|int $group): PermissionGroupCheck
    {
        $permissions = $this->getAllPermissions();

        $filtered = $permissions->filter(function ($permission) use ($group) {
            return $group === $permission->group?->id || strtoupper($group) === strtoupper($permission->group?->name);
        });

        return new PermissionGroupCheck($filtered);
    }
}
