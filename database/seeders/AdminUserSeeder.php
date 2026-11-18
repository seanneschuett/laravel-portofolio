<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Seed the admin account used to access the dashboard.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            ['username' => env('ADMIN_USERNAME', 'admin')],
            [
                'name' => env('ADMIN_NAME', 'Administrator'),
                'email' => env('ADMIN_EMAIL', 'admin@saradev.local'),
                'password' => Hash::make(env('ADMIN_PASSWORD', '12345')),
            ]
        );
    }
}
