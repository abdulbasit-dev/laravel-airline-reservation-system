<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\ClientCategory;
use App\Models\Zone;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $clients = ['Darawan', 'Kamil', 'Ali', "Mohammad",'Ahmad','Hakan','Ayub',"Faris",'Alan','Karim','Rebin'];

        foreach (range(1, 10) as $item) {
            Client::create([
                'name' => $clients[$item],
                'category_id' => ClientCategory::inRandomOrder()->first()->id,
                'zone_id' => Zone::inRandomOrder()->first()->id,
                'phone' => $faker->phoneNumber,
                'phone_alt' => $faker->phoneNumber,
                'address' => $faker->address,
                'lat' => 36 . '.' . rand(1000000, 9999999),
                'long' => rand(43, 44) . '.' . rand(1000000, 9999999),
                'loan_limit' => $faker->numberBetween(0, 2),
            ]);
        }
    }
}
