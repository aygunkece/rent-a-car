<?php

namespace Database\Seeders;

use App\Models\CompanyUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyUserCreateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       CompanyUser::create([
           'name' => 'Mehmet Yetkili',
           'company_id' => 1,
           'email' => 'authtest@gmail.com',
           'password' => bcrypt("Qw12345678*"),
           'phone' => '5554443322'
       ]);
    }
}
