<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Client;
use App\Models\Product;
use App\Models\User;
use DB;
use Faker\Factory;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->delete();

        $orderStatus = [
            "ordered", "canceled", "accepted", "assigned", "pickedup", "delivered",
        ];

        $faker = Factory::create();
        foreach (range(1, 30) as $key => $value) {
            $product  = Product::inRandomOrder()->first();
            $qty = rand(1, 10);
            $productPrice = $product->type ? $product->box_price : $product->price;
            $totalPrice = $productPrice * $qty;
            $order = Order::create([
                "client_id" => Client::inRandomOrder()->first()->id,
                "total_price" => $totalPrice,
                "profit" => rand(50000, 100000),
                "is_paid" => 0,
                "lat" => $faker->latitude("30", "46"),
                "long" => $faker->longitude("20", "45"),
                "coupon_code" => null,
                "note" => $faker->sentence(),
                "discount_type" => null,
                "discount_amount" => null,
                "arrive_at" => $faker->dateTimeBetween('+3 days', '+1 week'),
                "status" => $orderStatus[rand(0, 5)],
                "accepted_by" => 1, //admin
                "is_ordered" => 1,
                "order_by" => User::role(['driver', 'sale-representative'])->inRandomOrder()->first()->id,
                "accepted_at" => $faker->dateTimeBetween('-3 days', 'now'),
                "is_canceled" => 0,
                "is_accepted" => 1,
                "accepted_by" => 1,
                "is_assigned" => 0,
                "assigned_by" => null,
                "assigned_at" => null,
                "is_pickedup" => 0,
                "pickedup_by" => null,
                "pickedup_at" => null,
                "is_delivered" => 0,
            ]);

            $orderDetails = [
                [
                    "product_id" => $product->id,
                    "coupon_code" => null,
                    "quantity" => $qty,
                    "product_price" => $productPrice,
                    "total_price" => $totalPrice,
                ],

            ];

            $order->payment()->create([
                "order_id" => $order->id,
                "client_id" => $order->client_id,
                "paid" => 0,
                "due" => $order->total_price,
            ]);

            $order->orderDetails()->createMany($orderDetails);
        }
    }
}
