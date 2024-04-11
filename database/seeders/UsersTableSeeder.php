<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'               => 'Admin',
                'email'              => 'admin@admin.com',
                'password'           => bcrypt('password'),
                'active'             => 1,
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2024-03-14 18:56:59',
                'verification_token' => '',
            ],
        ];

        User::insert($users);
    }
}
