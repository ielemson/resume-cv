<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(CreateAdminTableSeeder::class);
        // $this->call(CreateUserSeeder::class);
    }
}
