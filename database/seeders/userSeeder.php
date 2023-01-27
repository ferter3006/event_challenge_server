<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'ferter',
            'email' => 'ferter@ferter.com',
            'password' => Hash::make('ferter'),
            'province' => 'tarragona',
            'city' => 'reus',
            'country' => 'spain'
        ]);

        User::create([
            'name' => 'ferter2',
            'email' => 'ferter@ferter.com2',
            'password' => Hash::make('ferter'),
            'province' => 'tarragona',
            'city' => 'reus',
            'country' => 'spain'
        ]);

        User::create([
            'name' => 'ferter3',
            'email' => 'ferter@ferter.com3',
            'password' => Hash::make('ferter'),
            'province' => 'tarragona',
            'city' => 'reus',
            'country' => 'spain'
        ]);

        User::create([
            'name' => 'ferter4',
            'email' => 'ferter4@ferter.com',
            'password' => Hash::make('ferter'),
            'province' => 'tarragona',
            'city' => 'reus',
            'country' => 'spain'
        ]);

        User::create([
            'name' => 'testUser',
            'email' => 'test@test.com',
            'password' => Hash::make('test'),
            'province' => 'madrid',
            'city' => 'madrid',
            'country' => 'spain'
        ]);
    }
}
