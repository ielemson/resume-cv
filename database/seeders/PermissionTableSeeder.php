<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
            $permissions = [
            'permission.show',
            'permission.add',
            'permission.delete',
            'roles.show',
            'roles.add',
            'roles.delete',
            'api-user.view',
            'user.show',
            'user.add',
            'user.edit',
            'user.delete'
            ];
    
    
            foreach ($permissions as $permission) {
                 Permission::create(['name' => $permission]);
            }
    }
}
