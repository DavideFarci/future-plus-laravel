<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            DB::table('messages')->insert([
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'message' => $faker->paragraph,
                'reply' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
