<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach (range(1,10) as $key ) {
            Contact::create([
                'subject' => $faker->sentence(2),
                'note' => $faker->text(),
                'user_id' => User::role(['sale-representative', 'driver'])->inRandomOrder()->first()->id,
            ]);
            
        }
    }
}
