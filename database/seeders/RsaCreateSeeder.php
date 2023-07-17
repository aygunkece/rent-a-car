<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\CompanyUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RsaCreateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rsaComp = Company::create([
            'name' => 'rsa',
            'email' => 'sercan.ozen@outlook.com.tr',
            'phone' => '05439292076',
            'tax_department' => 'Şişli',
            'tax_number' => '31236457891',
            'website' => 'yazilimegitim.com',
            'confirm' => 1,
            'pre_confirm' => 1,
            'status' => 1,
            'approve_agreement' => 1,
            'auth_email' => 'sercan.ozen@outlook.com.tr',
            'auth_name' => 'Sercan Özen',
            'auth_phone' => '05439292076',
        ]);

        $rsaCompUser = CompanyUser::create([
            'company_id' => $rsaComp->id,
            'password' => bcrypt('12345'),
            'name' => $rsaComp->auth_name,
            'email' => $rsaComp->auth_email,
            'phone' => $rsaComp->auth_phone,
            'is_rsa' => 1
        ]);
        $rsaRole = Role::query()
            ->where('guard_name', 'rsa')
            ->where('name', 'admin')
            ->first();
        $rsaCompUser->assignRole($rsaRole);
    }
}
