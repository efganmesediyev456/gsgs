<?php

namespace Database\Seeders;

use App\Models\Gopanel\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        if (
            is_null(
                Admin::query()->where('email', 'admin@gmail.com')->first()
            )
        ) {
            Admin::query()->create([
                'name' => 'Super Admin1',
                'email' => 'admin@gmail.com',
                'super' => 1,
                'password' => Hash::make('12345'),
            ]);
        }
    }
}
