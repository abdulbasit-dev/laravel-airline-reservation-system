<?php

namespace Database\Seeders;

use App\Models\Coupon;
use App\Models\User;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coupons')->delete();
        foreach (range(1, 10) as $i) {
            $discountType = $i % 2 == 0 ? 'percentage' : 'amount';
            Coupon::create([
                'created_by' => User::role(['admin'])->inRandomOrder()->first()->id,
                // 'type' => rand(0, 1) ? 'cart_base' : 'product_base',
                'type' => 'cart_base',
                'code' => 'COUPON_' . $i,
                'discount_type' => $discountType,
                'discount' => $discountType == "percentage" ? rand(10, 70) : round(rand(50000, 100000), -4),
                'start_date' => now(),
                'end_date' => now()->addDays(10),
            ]);
        }
    }
}
