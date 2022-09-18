<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Stand;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $titles = ["The shop was closed","They didn't have the money","They didn't want anything","They were't in the shop"];
        foreach (range(1, 10) as $key => $value) {
            $stand  = Stand::firstOrCreate(
                [
                    "user_id" => User::role(['sale-representative', 'driver'])->inRandomOrder()->first()->id,
                    "client_id" => Client::inRandomOrder()->first()->id,
                    "text" => $faker->randomElement($titles),
                    "lat"=>$faker->latitude(34.6,37.3),
                    'long'=>$faker->longitude(42,46),
                ]
            );
        }
    }
}
