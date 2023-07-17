<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table('roles')->truncate();
        Role::create([
           'guard_name' => "rsa",
            'name' => 'admin'
        ]);

        Role::create([
            'guard_name' => "company",
            'name' => 'admin'
        ]);
        DB::statement("SET FOREIGN_KEY_CHECKS=1");
    }
}
