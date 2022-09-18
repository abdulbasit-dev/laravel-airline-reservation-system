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
                "email" => "admin@nawand.com",
                "name" => "admin",
                "phone" => '0123456789',
            ],
            [
                "password" => bcrypt("password",)
            ]
        )->assignRole('admin');


        //SR
        User::firstOrCreate(
            [
                "email" => "basit@nawand.com",
                "name" => "basit",
                "phone" => '0123456781',
            ],
            [
                "password" => bcrypt("password"),
                "address"=> $faker->address(),
            ]
        )->assignRole('sale-representative');

        //driver
        User::firstOrCreate(
            [
                "email" => "john@nawand.com",
                "name" => "john",
                "phone" => '0123456782',
            ],
            [
                "password" => bcrypt("password"),
                "address" => $faker->address(),
            ]
        )->assignRole('driver');

        //generate sale-representative users
        foreach (range(1, 10) as $key => $value) {
            User::firstOrCreate(
                [
                    "email" => $faker->email(),
                    "name" => $faker->name(),
                    "phone" => $faker->phoneNumber(),
                ],
                [
                    "password" => bcrypt("password"),
                    "address"=> $faker->address(),
                ]
            )->assignRole('sale-representative');
        }

        //generate driver users
        foreach (range(1, 10) as $key => $value) {
            User::firstOrCreate(
                [
                    "email" => $faker->email(),
                    "name" => $faker->name(),
                    "phone" => $faker->phoneNumber(),
                ],
                [
                    "password" => bcrypt("password"),
                    "address"=> $faker->address(),
                ]
            )->assignRole('driver');
        }
    }
}
