<?php

namespace Database\Seeders;

use App\Models\ExchangeHistory;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ExchangeHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach (range(1,7) as $key ) {
            ExchangeHistory::create([
                "usd"=>100,
                "iqd"=>$faker->numberBetween(143,150),
                "action_by"=>1,
            ]);
        }
    }
}
