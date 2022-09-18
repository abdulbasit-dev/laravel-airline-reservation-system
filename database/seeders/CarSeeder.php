<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $models  =  ['Nissan', 'toyota', 'Mg', 'Cherry', 'Kia'];
        foreach (range(1, 6) as $key => $value) {
            Car::firstOrCreate(
                [
                    'user_id' => User::role(['driver', 'sale-representative'])->inRandomOrder()->first()->id,

                ],
                [
                    'plate_number' => rand(11111, 999999),
                    'model' => $models[rand(0, 4)],
                ]
            );
        }
    }
}
