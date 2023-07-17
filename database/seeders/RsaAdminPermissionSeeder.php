<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RsaAdminPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'name' => 'Admin Kullanıcısı Ekleme',
                'guard_name' => 'rsa',
                'group' => 'Admin Kullanıcı İşlemleri'
            ],
            [
                'name' => 'Admin Kullanıcılarını Düzenleme',
                'guard_name' => 'rsa',
                'group' => 'Admin Kullanıcı İşlemleri'
            ],
            [
                'name' => 'Admin Kullanıcılarını Silme',
                'guard_name' => 'rsa',
                'group' => 'Admin Kullanıcı İşlemleri'
            ],
            [
                'name' => 'Admin Kullanıcılarını Listeleme',
                'guard_name' => 'rsa',
                'group' => 'Admin Kullanıcı İşlemleri'
            ],

            //Kurumsal Üye İşlemleri

            [
                'name' => 'Kurumsal Üye Firma Ekleme',
                'guard_name' => 'rsa',
                'group' => 'Kurumsal Üye İşlemleri'
            ],
            [
                'name' => 'Kurumsal Üye Firmaları Listeleme',
                'guard_name' => 'rsa',
                'group' => 'Kurumsal Üye İşlemleri'
            ],
            [
                'name' => 'Kurumsal Üye Firmaları Düzenleme',
                'guard_name' => 'rsa',
                'group' => 'Kurumsal Üye İşlemleri'
            ],
            [
                'name' => 'Kurumsal Üye Firmaları Silme',
                'guard_name' => 'rsa',
                'group' => 'Kurumsal Üye İşlemleri'
            ],
            [
                'name' => 'Kurumsal Üye Firma Durum Değiştirme',
                'guard_name' => 'rsa',
                'group' => 'Kurumsal Üye İşlemleri'
            ],
            [
                'name' => 'Kurumsal Üye Başvuru Görüntüleme',
                'guard_name' => 'rsa',
                'group' => 'Kurumsal Üye İşlemleri'
            ],
            [
                'name' => 'Kurumsal Üye Başvuru Onay Verme',
                'guard_name' => 'rsa',
                'group' => 'Kurumsal Üye İşlemleri'
            ],
            [
                'name' => 'Kurumsal Üye Kullanıcı Ekleme',
                'guard_name' => 'rsa',
                'group' => 'Kurumsal Üye İşlemleri'
            ],
            [
                'name' => 'Kurumsal Üye Kullanıcı Listeleme',
                'guard_name' => 'rsa',
                'group' => 'Kurumsal Üye İşlemleri'
            ],
            [
                'name' => 'Kurumsal Üye Kullanıcı Düzenleme',
                'guard_name' => 'rsa',
                'group' => 'Kurumsal Üye İşlemleri'
            ],
            [
                'name' => 'Kurumsal Üye Kullanıcı Silme',
                'guard_name' => 'rsa',
                'group' => 'Kurumsal Üye İşlemleri'
            ],
            [
                'name' => 'Kurumsal Üye Kullanıcı Durum Değiştirme',
                'guard_name' => 'rsa',
                'group' => 'Kurumsal Üye İşlemleri'
            ],


            //Standart Üye İşlemleri

            [
                'name' => 'Standart Üye Ekleme',
                'guard_name' => 'rsa',
                'group' => 'Standart Üye İşlemleri'
            ],
            [
                'name' => 'Standart Üye Listeleme',
                'guard_name' => 'rsa',
                'group' => 'Standart Üye İşlemleri'
            ],
            [
                'name' => 'Standart Üye Düzenleme',
                'guard_name' => 'rsa',
                'group' => 'Standart Üye İşlemleri'
            ],
            [
                'name' => 'Standart Üye Silme',
                'guard_name' => 'rsa',
                'group' => 'Standart Üye İşlemleri'
            ],
            [
                'name' => 'Standart Üye Durum Değiştirme',
                'guard_name' => 'rsa',
                'group' => 'Standart Üye İşlemleri'
            ],


            //Kur İşlemleri

            [
                'name' => 'Kur Görüntüleme',
                'guard_name' => 'rsa',
                'group' => 'Kur İşlemleri'
            ],
            [
                'name' => 'Kur Düzenleme',
                'guard_name' => 'rsa',
                'group' => 'Kur İşlemleri'
            ],


            //Seo İşlemleri

            [
                'name' => 'Seo Listeleme',
                'guard_name' => 'rsa',
                'group' => 'Seo İşlemleri'
            ],
            [
                'name' => 'Seo Düzenleme',
                'guard_name' => 'rsa',
                'group' => 'Seo İşlemleri'
            ],

            //Dil İşlemleri

            [
                'name' => 'Dil Ekleme',
                'guard_name' => 'rsa',
                'group' => 'Dil İşlemleri'
            ],
            [
                'name' => 'Dil İfade Düzenleme',
                'guard_name' => 'rsa',
                'group' => 'Dil İşlemleri'
            ],
            [
                'name' => 'Dil Listeleme',
                'guard_name' => 'rsa',
                'group' => 'Dil İşlemleri'
            ],
            [
                'name' => 'Dil Aktif Etme',
                'guard_name' => 'rsa',
                'group' => 'Dil İşlemleri'
            ],

            //Müşteri İşlemleri

            [
                'name' => 'Müşteri Yorumu Ekleme',
                'guard_name' => 'rsa',
                'group' => 'Müşteri İşlemleri'
            ],
            [
                'name' => 'Müşteri Yorumu Düzenleme',
                'guard_name' => 'rsa',
                'group' => 'Müşteri İşlemleri'
            ],
            [
                'name' => 'Müşteri Yorumu Silme',
                'guard_name' => 'rsa',
                'group' => 'Müşteri İşlemleri'
            ],
            [
                'name' => 'Müşteri Yorumu Listeleme',
                'guard_name' => 'rsa',
                'group' => 'Müşteri İşlemleri'
            ],


            //Kampanya İşlemleri

            [
                'name' => 'Kampanya Ekleme',
                'guard_name' => 'rsa',
                'group' => 'Kampanya İşlemleri'
            ],
            [
                'name' => 'Kampanya Listeleme',
                'guard_name' => 'rsa',
                'group' => 'Kampanya İşlemleri'
            ],
            [
                'name' => 'Kampanya Bireysel Satış Durumu Güncelleme',
                'guard_name' => 'rsa',
                'group' => 'Kampanya İşlemleri'
            ],
            [
                'name' => 'Kampanya Kurumsal Üyeleri Görüntüleme',
                'guard_name' => 'rsa',
                'group' => 'Kampanya İşlemleri'
            ],


            //Araç İşlemleri

            [
                'name' => 'Araç Ekleme',
                'guard_name' => 'rsa',
                'group' => 'Araç İşlemleri'
            ],
            [
                'name' => 'Araç Düzenleme',
                'guard_name' => 'rsa',
                'group' => 'Araç İşlemleri'
            ],
            [
                'name' => 'Araç Silme',
                'guard_name' => 'rsa',
                'group' => 'Araç İşlemleri'
            ],
            [
                'name' => 'Araç Listeleme',
                'guard_name' => 'rsa',
                'group' => 'Araç İşlemleri'
            ],

            //Genel Ayar İşlemleri

            [
                'name' => 'Genel Ayarları Görüntüleme',
                'guard_name' => 'rsa',
                'group' => 'Genel Ayar İşlemleri'
            ],
            [
                'name' => 'Genel Ayarları Düzenleme',
                'guard_name' => 'rsa',
                'group' => 'Genel Ayar İşlemleri'
            ],

            //Transfer İşlemleri

            [
                'name' => 'Transferleri Listeleme',
                'guard_name' => 'rsa',
                'group' => 'Transfer İşlemleri'
            ],
            [
                'name' => 'Transfer Düzenleme',
                'guard_name' => 'rsa',
                'group' => 'Transfer İşlemleri'
            ],
            [
                'name' => 'Transfer Detay Görüntüleme',
                'guard_name' => 'rsa',
                'group' => 'Transfer İşlemleri'
            ],

        ];
        Permission::insert($permissions);

        $permissions = Permission::query()
            ->where('guard_name', 'rsa')
            ->get();
        $rsaAdminRole = Role::query()
            ->where('name', 'admin')
            ->where('guard_name', 'rsa')
            ->first();

        $rsaAdminRole->givePermissionTo($permissions);
    }
}
