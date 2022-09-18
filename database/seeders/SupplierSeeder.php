<?php

namespace Database\Seeders;

use App\Models\Supplier;
use DB;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        DB::table('suppliers')->delete();
        $faker = Factory::create();

        foreach (range(1, 10) as $key) {
            Supplier::firstOrCreate([
                'name' => $faker->company() . $key,
                'company_name' => $faker->company() . $key,
                'address' => $faker->address(),
                'phone' => $faker->phoneNumber(),
                'phone_alt' => $faker->phoneNumber(),
            ]);
        }
    }
}
