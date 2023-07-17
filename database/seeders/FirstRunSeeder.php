<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FirstRunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            CompanyAdminPermissionSeeder::class,
            CompanyCreateSeeder::class,
            CompanyUserCreateSeeder::class,
            LanguageSeeder::class,
            RsaAdminPermissionSeeder::class,
            RsaCreateSeeder::class
        ]);
    }
}
