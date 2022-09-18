<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Coupon;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //check permission
        $this->authorize("coupon_view");

        $coupons = Coupon::withoutGlobalScope('relation-load')->select([
            'code', 'discount', 'discount_type', 'start_date', 'end_date'
        ])->get();

        return $this->josnResponse(true, __('api.all_resource', ['resource' => __('attributes.coupon')]), Response::HTTP_OK, $coupons);
    }

    public function applyCoupon(Request $request)
    {
        //find coupon code
        $coupon = Coupon::firstWhere('code', $request->code);

        // check if coupon is exist
        if (!$coupon) {
            return $this->josnResponse(false, __('api.coupon_invalid'), Response::HTTP_OK);
        }

        // check if coupon is not expired
        if (!$coupon->isExpired()) {
            return $this->josnResponse(false, __('api.coupon_expired'), Response::HTTP_OK);
        }

        // get user
        $user = auth()->user();

        // get all cart items that added by this user
        $cartItems = Cart::whereAddedBy($user->id)->get();

        // check for empty card
        if (!count($cartItems)) {
            return $this->josnResponse(true, __('api.cart_empty'), Response::HTTP_OK, []);
        }

        if ($coupon->type == "cart_base") {
            $sum = 0;
            foreach ($cartItems as $key => $cartItem) {
                $sum += $cartItem['price'] * $cartItem['quantity'];
            }

            // find coupon discount (how much discount will be applied)
            if ($coupon->discount_type === 'percentage') {
                $couponDiscount = $sum * $coupon->discount / 100;
            } elseif ($coupon->discount_type === 'amount') {
                $couponDiscount = $coupon->discount;
            }

            Cart::whereAddedBy($user->id)->update([
                // divide coupon discount by cart items quantity
                "discount" => $couponDiscount / count($cartItems),
                "coupon_code" => $coupon->code,
                "coupon_applied" => true,
            ]);

            $couponDetail = [
                "code" => $coupon->code,
                "type" => $coupon->discount_type,
                "coupon_discount" => $coupon->discount,
                "cart_discount" => formatPrice(Cart::whereAddedBy($user->id)->sum('discount')),
            ];
        } else {
            return $this->josnResponse(true, "برۆ کەوەر", Response::HTTP_OK);
        }



        return $this->josnResponse(true, __('api.coupon_apply'), Response::HTTP_OK, $couponDetail ?? null);
    }

    public function removeCoupon()
    {
        Cart::whereAddedBy(auth()->id())->update([
            "discount" => 0,
            "coupon_code" => null,
            "coupon_applied" => false,
        ]);

        return $this->josnResponse(true, __('api.coupon_remove'), Response::HTTP_OK);
    }
}
