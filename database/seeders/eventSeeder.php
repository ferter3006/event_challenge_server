<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class eventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'user_id' => 1,
            'title' => 'The event nº 1',
            'description' => 'recogida de plasticos',
            'organization' => 'ferter organitzation',
            'adress' => 'c/ miro',
            'adress_adds' => 'junto al rio',
            'province' => 'Tarragona',
            'city' => 'reus',
            'country' => 'spain',
            'init_time' => '8:00:00',
            'end_time' => '12:00:00',
            'day' => '2023-05-05',
            'image' => 1,
        ]);

        Event::create([
            'user_id' => 1,
            'title' => 'Event number 2',
            'description' => 'recogida de madera',
            'organization' => 'ayuntamiento miento',
            'adress' => 'c/ pepe',
            'adress_adds' => 'junto al bosque',
            'province' => 'Tarragona',
            'city' => 'reus',
            'country' => 'spain',
            'init_time' => '8:00:00',
            'end_time' => '12:00:00',
            'day' => '2023-02-25',
            'image' => 2,
        ]);

        Event::create([
            'user_id' => 2,
            'title' => 'Sea Wash',
            'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.",
            'organization' => 'Earth ONG',
            'adress' => 'Penny Lane Road nº 4',
            'adress_adds' => 'You will find us near the tree',
            'province' => 'Barcelona',
            'city' => 'Barcelona',
            'country' => 'spain',
            'init_time' => '8:30:00',
            'end_time' => '12:45:00',
            'day' => '2023-03-12',
            'image' => 3,
        ]);

        Event::create([
            'user_id' => 1,
            'title' => 'LoremIpsum',
            'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only.",
            'organization' => 'ayuntamiento',
            'adress' => 'c/ Cervantes, 4',
            'adress_adds' => '',
            'province' => 'Tarragona',
            'city' => 'Cambrils',
            'country' => 'spain',
            'init_time' => '8:00:00',
            'end_time' => '12:00:00',
            'day' => '2023-07-25',
            'image' => 3,
        ]);

        Event::create([
            'user_id' => 1,
            'title' => 'Mountain Wash',
            'description' => 'recogida de basura en el bosque',
            'organization' => 'Spain Hikers Association',
            'adress' => 'c/ Zaragoza',
            'adress_adds' => 'junto al bosque',
            'province' => 'Zaragoza',
            'city' => 'Zaragoza',
            'country' => 'spain',
            'init_time' => '8:00:00',
            'end_time' => '12:00:00',
            'day' => '2023-12-25',
            'image' => 1,
        ]);
    }
}
