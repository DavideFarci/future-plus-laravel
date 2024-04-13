<?php

namespace Database\Seeders;

use App\Models\Consumer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConsumersTableSeeder extends Seeder
{
    public function run()
    {
        $consumers = [
            [
                'phone'      => '0',
                'lastName'      => '0',
                'firstName'      => '0',
                'email'     => '0',
                'status'     => '0',
                
            ],
           
        ];
        
        foreach ($consumers as $consumer_data) {
            Consumer::create($consumer_data);
        }
    }
}
