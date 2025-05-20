<?php

namespace Custom\PermissionGroup\Commands;

use Illuminate\Console\Command;
use Custom\PermissionGroup\Models\PermissionGroup;
use Custom\PermissionGroup\Models\Permission;
use Custom\PermissionGroup\Models\Role;

class PermissionSyncCommand extends Command
{
    protected $signature = 'permission:sync';

    protected $description = 'Sync default permission groups, roles and permissions';

    public function handle()
    {
        $this->info('Syncing permission groups, roles and permissions...');

        // Example default groups
        $groups = [
            'User Management' => ['CREATE_USER', 'EDIT_USER', 'SHOW_USER', 'DELETE_USER'],
            'Post Management' => ['CREATE_POST', 'EDIT_POST', 'SHOW_POST', 'DELETE_POST'],
        ];

        foreach ($groups as $groupName => $permissions) {
            $group = PermissionGroup::firstOrCreate(['name' => $groupName]);
            foreach ($permissions as $permName) {
                Permission::firstOrCreate([
                    'name' => $permName,
                    'permission_group_id' => $group->id,
                ]);
            }
        }

        // Example roles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $user = Role::firstOrCreate(['name' => 'user']);

        // Attach all permissions to admin
        $allPermissions = Permission::all();
        $admin->permissions()->sync($allPermissions->pluck('id')->toArray());

        $this->info('Permission sync complete.');
    }
}