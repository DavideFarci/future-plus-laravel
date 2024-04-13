<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'      => 'Davide Farci',
                'email'     => 'davide.farci9@gmail.com',
                'password'  => Hash::make('Davide$1'),
            ],
            [
                'name'      => 'Ceo',
                'email'     => 'info@future-plus.it',
                'password'  => Hash::make('Th3l3z'),
            ]
        ];

        foreach ($users as $user_data) {
            User::create($user_data);
        }
    }
}
