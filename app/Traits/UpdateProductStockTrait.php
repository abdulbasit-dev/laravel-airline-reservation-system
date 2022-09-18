<?php

namespace App\Traits;

use App\Models\Product;

trait UpdateProductStockTrait
{
    //DESC: Update product stock while ordering and chnaging order status (cancel/accept)

    public function incrementProductStock($collection)
    {
        foreach ($collection as $item) {
            $product = Product::find($item->product_id);

            //update product number of sale
            $product->decrement('num_of_sales');

            //increment product stock 
            if ($item->type) {
                $product->increment("box_quantity", $item->quantity + $item->free);
                // reduce product box quantity
                $product->increment("quantity", (($item->quantity + $item->free) * $product->pcs_per_box));
            } else {
                $product->increment("quantity", $item->quantity + $item->free);
                // get new box qunatity
                $newBoxQuantity = $product->quantity / $product->pcs_per_box;

                // update box quantity
                $product->update([
                    "box_quantity" => $newBoxQuantity
                ]);
            }
        }
    }

    public function decrementProductStock($collection)
    {
        foreach ($collection as $item) {
            $product = Product::find($item->product_id);

            //update product number of sale
            $product->increment('num_of_sales');

            if ($item->type) {
                $product->decrement("box_quantity", $item->quantity + $item->free);
                // reduce product box quantity
                $product->decrement("quantity", (($item->quantity + $item->free) * $product->pcs_per_box));
            } else {
                $product->decrement("quantity", $item->quantity + $item->free);
                // get new box qunatity
                $newBoxQuantity = $product->quantity / $product->pcs_per_box;

                // update box quantity
                $product->update([
                    "box_quantity" => $newBoxQuantity
                ]);
            }
        }
    }
}
