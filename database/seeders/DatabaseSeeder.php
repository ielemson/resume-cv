<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(RolePermissionsSeeder::class);
        // $this->call(CreateUserSeeder::class);
    }
}
