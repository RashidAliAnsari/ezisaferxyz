<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Super Admin',
            'slug' => 'super-admin',
        ]);

        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);

        Role::create([
            'name' => 'Agency',
            'slug' => 'agency',
        ]);

        Role::create([
            'name' => 'Agency Customer',
            'slug' => 'customer',
        ]);
    }
}
