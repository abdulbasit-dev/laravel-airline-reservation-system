<?php

namespace Database\Seeders;

use App\Models\ClientCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ["Market",'Super Market','Mall'];

        foreach ($arr as $item) {
            ClientCategory::create([
                'name' => $item,
            ]);
        }
        
    }
}
