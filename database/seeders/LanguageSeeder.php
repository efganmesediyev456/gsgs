<?php

namespace Database\Seeders;

use App\Models\Entities\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $array = [
            [
                'locale'      => 'az',
                'title'       => 'Azerbaijani',
                'status'      => 1,
            ],
            [
                'locale'      => 'en',
                'title'       => 'Engslish',
                'status'      => 1,
            ],
            [
                'locale'      => 'ru',
                'title'       => 'Russian',
                'status'      => 1,
            ]
        ];

        foreach ($array as $key => $value) {
            if (Language::where("locale", $value['locale'])->count() == 0) {
                Language::insert($value);
            }
        }

    }
}
