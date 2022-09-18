<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Safe;
use App\Models\ExpenseTag;
use App\Models\Expense;
use Faker\Factory;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach (range(1, 7) as $key) {
            ExpenseTag::create([
                "name" => $faker->word()
            ]);
        }
        foreach (range(1, 13) as $key) {
            Expense::create([
                "title" => $faker->sentence(),
                "description" => $faker->paragraph(),
                "price" => $faker->numerify("#####"),
                "user_id" => User::inRandomOrder()->first()->id,
                "safe_id" => safe::inRandomOrder()->first()->id,
                "tag_id" => ExpenseTag::inRandomOrder()->first()->id,
                "created_at" => $faker->dateTimeBetween("-8 month", "now")
            ]);
        }
    }
}
