<?php

namespace Database\Seeders;

use App\Models\Inscritos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class inscritosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Inscritos::create([
            'user_id' => 2,
            'event_id' => 1
        ]);

        Inscritos::create([
            'user_id' => 1,
            'event_id' => 2
        ]);

        Inscritos::create([
            'user_id' => 4,
            'event_id' => 1
        ]);
        Inscritos::create([
            'user_id' => 2,
            'event_id' => 2
        ]);
    }
}
