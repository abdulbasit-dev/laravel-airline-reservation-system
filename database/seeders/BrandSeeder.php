<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['Zer', 'Altunsa', 'Raz', 'Mahmood', 'Ahmad'];

        foreach ($arr as $item) {
            Brand::firstOrCreate([
                'name' => $item,
            ]);
        }
    }
}
