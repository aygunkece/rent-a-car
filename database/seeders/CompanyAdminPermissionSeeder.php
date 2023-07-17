<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CompanyAdminPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [

            //Genel Profil İşlemleri

            [
                'name' => 'Genel Profil Görüntüleme',
                'guard_name' => 'company',
                'group' => 'Genel Profil İşlemleri'
            ],
            [
                'name' => 'Genel Profil Düzenleme',
                'guard_name' => 'company',
                'group' => 'Genel Profil İşlemleri'
            ],

            //Kullanıcı İşlemleri
            [
                'name' => 'Kullanıcı Ekleme',
                'guard_name' => 'company',
                'group' => 'Kullanıcı İşlemleri'
            ],
            [
                'name' => 'Kullanıcı Düzenleme',
                'guard_name' => 'company',
                'group' => 'Kullanıcı İşlemleri'
            ],
            [
                'name' => 'Kullanıcı Silme',
                'guard_name' => 'company',
                'group' => 'Kullanıcı İşlemleri'
            ],
            [
                'name' => 'Kullanıcıları Listeleme',
                'guard_name' => 'company',
                'group' => 'Kullanıcı İşlemleri'
            ],

            //Kendi Profil İşlemleri

            [
                'name' => 'Kendi Profilini Görüntüleme',
                'guard_name' => 'company',
                'group' => 'Kendi Profil İşlemleri'
            ],
            [
                'name' => 'Kendi Profilini Düzenleme',
                'guard_name' => 'company',
                'group' => 'Kendi Profil İşlemleri'
            ],
            [
                'name' => 'Kendi Şifresini Değiştirme',
                'guard_name' => 'company',
                'group' => 'Kendi Profil İşlemleri'
            ],

            //Transfer İşlemleri

            [
                'name' => 'Transfer Hareketi Listesini Görebilir',
                'guard_name' => 'company',
                'group' => 'Transfer İşlemleri'
            ],
            [
                'name' => 'Transfer Hareketi Listesinin Çıktısını Alabilir',
                'guard_name' => 'company',
                'group' => 'Transfer İşlemleri'
            ],
            [
                'name' => 'Transfer Hareketi Detayını Görüntüler',
                'guard_name' => 'company',
                'group' => 'Transfer İşlemleri'
            ],
        ];
        Permission::insert($permissions);

        $permissions = Permission::query()
            ->where('guard_name', 'company')
            ->get();
        $companyAdminRole = Role::query()
            ->where('name', 'admin')
            ->where('guard_name', 'company')
            ->first();

        $companyAdminRole->givePermissionTo($permissions);



    }
}
