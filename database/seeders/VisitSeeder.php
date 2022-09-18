<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Client;
use App\Models\Visit;
use App\Models\VisitDescription;
use Illuminate\Support\Facades\DB;

class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('visits')->delete();
        $faker = \Faker\Factory::create();
        $titles = ["The shop was closed","They didn't have the money","They didn't want anything","They were't in the shop"];
        foreach ($titles as $title) {
            VisitDescription::firstOrCreate(['title'=>$title]);
        }

        foreach (range(1, 10) as $key => $value) {
            Visit::firstOrCreate(
                [
                    "user_id" => User::role(['sale-representative', 'driver'])->inRandomOrder()->first()->id,
                    "client_id" => Client::inRandomOrder()->first()->id,
                    "text" => $faker->randomElement($titles),
                    "lat"=>$faker->latitude(34.6,37.3),
                    'long'=>$faker->longitude(42,46),
                    "created_at" => $faker->dateTimeBetween("-30 day", "now"),
                ]
            );
        }
    }
}
