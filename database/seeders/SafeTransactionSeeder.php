<?php

namespace Database\Seeders;

use faker\Factory;
use App\Models\Safe;
use App\Models\SafeTransaction;
use Illuminate\Database\Seeder;

class SafeTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Factory::create();
        // foreach (range(1,50) as $key ) {
        //     SafeTransaction::create([
        //         "safe_id"=>Safe::inRandomOrder()->first()->id,
        //         "date"=>$faker->dateTimeBetween('-1 month', '+1 month'),
        //         "type"=>$faker->randomElement(['deposit','withdraw']),
        //         "transaction_by"=>1,
        //         "action_by"=>1,
        //         "amount"=>$faker->numberBetween(100,150),
        //         "note"=>$faker->sentence(),
        //     ]);
        // }
    }
}
