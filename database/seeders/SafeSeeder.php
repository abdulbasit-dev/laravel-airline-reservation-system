<?php

namespace Database\Seeders;

use faker\Factory;
use App\Models\Safe;
use Illuminate\Database\Seeder;

class SafeSeeder extends Seeder
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
            Safe::create([
                "name"=>$faker->firstName(),
                "address"=>$faker->address(),
                "is_active"=>1,
                "available_money"=>0,
                "created_by"=>1,
            ]);
        }
    }
}
