<?php

namespace MahdiawanNK\PermissionGroup\Support;

use Illuminate\Support\Collection;

class PermissionGroupCheck
{
    protected Collection $permissions;

    public function __construct(Collection $permissions)
    {
        $this->permissions = $permissions;
    }

    public function hasPermission(string $action): bool
    {
        $action = strtoupper($action);

        return $this->permissions->contains(function ($permission) use ($action) {
            return str_starts_with($permission->name, $action);
        });
    }
}
