<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class SeederTablePermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // Operaciones sobre tabla roles
            'view-rol',
            'create-rol',
            'edit-rol',
            'delete-rol',

            // Operaciones sobre tabla blogs
            'view-blog',
            'create-blog',
            'edit-blog',
            'delete-blog',

            // Operaciones sobre tabla users
            'view-user',
            'create-user',
            'edit-user',
            'delete-user',

            // Operaciones sobre tabla permissions
            'view-permission',
            'create-permission',
            'edit-permission',
            'delete-permission',
        ];

        foreach($permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }
    }
}
