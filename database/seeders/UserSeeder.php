<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        //admin 
        User::firstOrCreate(
            [
                "email" => "admin@airline.com",
                "name" => "admin",
                "phone" => '0123456789',
            ],
            [
                'is_admin' => true,
                "password" => bcrypt("password",)
            ]
        );

        //generate customer users
        foreach (range(1, 10) as $key => $value) {
            User::firstOrCreate(
                [
                    "email" => $faker->email(),
                    "phone" => $faker->phoneNumber(),
                ],
                [
                    "is_admin" => 0,
                    "name" => $faker->name(),
                    "password" => bcrypt("password"),
                    "address" => $faker->address(),
                ]
            );
        }
    }
}
