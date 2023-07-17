<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $langs = [
            [
                'name' => 'Türkçe',
                'short_name' => 'tr',
                'status' => 1
            ],
            [
                'name' => 'English',
                'short_name' => 'en',
                'status' => 1
            ],
        ];
        Language::insert($langs);
    }
}
