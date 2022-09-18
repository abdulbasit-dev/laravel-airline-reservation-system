<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['Rise', 'Suger', 'Oil', 'Tea', 'Flour'];

        foreach ($arr as $item) {
            Category::firstOrCreate([
                'name' => $item,
            ]);
        }
    }
}
