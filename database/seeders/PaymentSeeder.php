<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use App\Models\PaymentHistory;
use App\Models\Safe;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach (range(1,10) as $key ) {
            $order = Order::find($key);
            $payment = Payment::create([
            "order_id"=>$order->id,
            "client_id"=>$order->client_id,
            "paid"=>$order->total_price/2,
            "due"=>$order->total_price,
            "is_paid"=>0,
            "is_lost"=>0,
            "lost_note"=>null,
            ]);
            $this->createHistory($payment,$order->total_price/2,$faker);
        }
        foreach (range(11,20) as $key) {
            $order = Order::find($key);
            $payment = Payment::create([
            "order_id"=>$order->id,
            "client_id"=>$order->client_id,
            "paid"=>$order->total_price,
            "due"=>0,
            "is_paid"=>1,
            "is_lost"=>0,
            "lost_note"=>null,
            ]);
            $this->createHistory($payment,$order->total_price,$faker);
       }
    }
    private function createHistory($payment,$paid,$faker){
        $safe=Safe::inRandomOrder()->first();
        PaymentHistory::create([
            "payment_id"=>$payment->id,
            "amount_paid"=>$paid,
            "date"=>date_format($faker->dateTimeBetween('+1 week', '+1 month'),"Y-m-d"),
            "client_id"=>$payment->client_id,
            "user_id"=>User::role(['sale-representative', 'driver'])->inRandomOrder()->first()->id,
            "is_money_returned"=>0,
            "money_accepted_by"=>null,
            "safe_id"=>$safe->id,
            "usd_rate"=>$faker->numerify('1.48##'),
            "exchange_type"=>$faker->randomElement(["USD","IQD"]),
        ]);
        
        $safe->transactions()->create([
            "transaction_by"=>1,
            "action_by"=>1,
            "type"=>"deposit",
            "amount"=>$paid,
            "note"=>"
            TODO                
            ",
            "date"=>now(),
        ]);

        $safe->increment('available_money',$paid);
    }
}
