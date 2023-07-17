<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyCreateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'TestFirması',
            'email' => 'test@gmail.com',
            'phone' => '5554443322',
            'tax_department' => 'Küçük Kurumlar',
            'tax_number' => '33442211445',
            'website' => 'testfirma.com',
            'confirm' => 0,
            'pre_confirm' => 0,
            'approve_agreement' => 1,
            'auth_email' => 'authtest@gmail.com',
            'auth_name' => 'Mehmet Yetkili',
            'auth_phone' => '5554443322',

        ]);
    }
}
