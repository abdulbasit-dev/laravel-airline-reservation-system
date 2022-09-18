<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Product;
use App\Models\ReturnProduct;
use App\Models\User;
use Illuminate\Database\Seeder;
use DB;

class ReturnProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //empty the return product table
        DB::table('return_products')->delete();

        // get 3 clients
        $clients = Client::limit(3)->get();
        // foreach client return between 2 to 5 products
        foreach ($clients as $client) {
            foreach (range(1, 4) as $key => $value) {
                ReturnProduct::create([
                    'user_id' => rand(0, 1) ? User::role(['driver', 'sale-representative'])->inRandomOrder()->first()->id : 1,
                    'client_id' => $client->id,
                    'product_id' => Product::inRandomOrder()->first()->id,
                    'quantity' => rand(1, 10),
                    'reason' => "Lorem ipsum dolor sit amet consectetur",
                    'type' => rand(0, 1),
                    'return_date' => now(),
                ]);
            }
        }
    }
}
