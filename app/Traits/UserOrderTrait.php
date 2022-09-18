<?php

namespace App\Traits;

use App\Models\Order;

trait UserOrderTrait
{
    // return orders accoring to user role (sale-repsesentative/driver)
    public function userOrder()
    {
        $userId = auth()->id();
        $userRoleName =  auth()->user()->getRoleNames()[0];
        $query = null;
        if ($userRoleName == 'sale-representative') {
            $query = Order::query()
                ->where('order_by', $userId);
        } else {
            $query = Order::query()
                ->where('pickedup_by', $userId);
        }

        return $query;
    }
}
