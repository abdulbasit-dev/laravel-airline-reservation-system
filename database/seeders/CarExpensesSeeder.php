<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarExpense;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarExpensesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ini_set('memory_limit', '-1');
        DB::table('car_expenses')->delete();
        $faker = Factory::create();
        foreach (range(1, 100) as $key => $value) {
            $CarExpense = CarExpense::firstOrCreate([
                "car_id"=> Car::inRandomOrder()->first()->id,
                "user_id"=>  User::role(['driver', 'sale-representative'])->inRandomOrder()->first()->id,
                "title"=> $faker->sentence(3),
                "description"=> $faker->sentence(10),
                "price"=> $faker->numberBetween(10000, 100000),
                "created_at"=> $faker->dateTimeBetween("-8 month", "now"),
            ]);

            $CarExpense->addMedia(public_path() . '/images/dummy_expense.png')->preservingOriginal()->usingName($CarExpense->title)->toMediaCollection();
        }
    }
}
