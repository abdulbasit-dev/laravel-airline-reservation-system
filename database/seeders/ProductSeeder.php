<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Purchase;
use App\Models\User;
use App\Models\Safe;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        ini_set('memory_limit', '-1');
        DB::table('products')->delete();

        // $products = ["Tomato Paste", "Sunflower Seed Oil 700 Ml" , "Powder Detergent Hand Wash"];
        $products = [
            [
                "name" => "Tomato Paste",
                "image" => "tomato-paste.jpg",
            ],
            [
                "name" => "Sunflower Seed Oil 700 Ml",
                "image" => "sunflower-seed.jpg",
            ],
            [
                "name" => "Black Olive 360 Gr (1/2)",
                "image" => "black olive.jpg",
            ],
            [
                "name" => "Cowpea 700 Gr",
                "image" => "cowpea.jpg",
            ],
            [
                "name" => "Corn Starch 900 Gr",
                "image" => "corn starch.jpg",
            ],
            [
                "name" => "Cream Mushroom Instant Soup 60 Gr",
                "image" => "Cream Mushroom Instant Soup 60 Gr.jpg",
            ],
            [
                "name" => "Chicken Bouillon Powder 10 Gr",
                "image" => "Chicken Bouillon Powder 10 Gr.jpg",
            ],
            [
                "name" => "Jam Fig 380 Gr",
                "image" => "Jam Fig 380 Gr.jpg",
            ],
            [
                "name" => "Jam Blackberry 380 Gr",
                "image" => "Jam Blackberry 380 Gr.jpg",
            ],
            [
                "name" => "Hazelnut Cream With Milk And Cocoa  (Duo) 350 Gr",
                "image" => "Hazelnut Cream With Milk And Cocoa  (Duo) 350 Gr.jpg",
            ],
            [
                "name" => "Powder Detergent Hand Wash",
                "image" => "Powder Detergent Hand Wash.jpg",
            ],
            [
                "name" => "liquid Laundry Detergent (Colors) 2 Lt",
                "image" => "liquid Laundry Detergent (Colors) 2 Lt.jpg",
            ],
        ];
        // //piece
        // foreach (range(1, 50) as $key => $value) {
        //     $price = round(rand(1000, 100000), -4);
        //     $product  = Product::create([
        //         'name' => 'Rise' . rand(1, 100),
        //         "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem iste vero laboriosam consequatur commodi temporibus. .",
        //         'added_by' => User::role('admin')->first()->id,
        //         'category_id' => Category::inRandomOrder()->first()->id,
        //         // 'brand_id' => Brand::inRandomOrder()->first()->id,
        //         'supplier_id' => Supplier::inRandomOrder()->first()->id,
        //         'barcode' => rand(1000000, 9999999),
        //         'quantity' => 100,
        //         "low_stock_quantity" => 10,
        //         'purchase_price' => $price,
        //         'price' => $price + 10000,
        //         'min_sell_price' => $price + 5000,
        //         "num_of_sales" => rand(1, 100),
        //         'expire_at' => Carbon::now()->addYears(rand(1, 3)),
        //     ]);

        //     $product->addMedia(public_path() . '/images/dummy_product.jpg')->preservingOriginal()->usingName($product->name)->toMediaCollection();

        //     $this->purchase($product);
        // }

        //box
        foreach ($products as $item) {
            $boxPrice = round(rand(80000, 400000), -4);
            $price = round(rand(1000, 100000), -4);
            $pcsPerBox = rand(10, 20);
            $boxQty = rand(20, 40);
            $weightUnit = rand(1, 2) == 1 ? "kg" : "gr";
            $weight = $weightUnit == "kg" ? rand(1, 3) : rand(700, 1000);
            $product  = Product::create([
                'name' => $item['name'],
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem iste vero laboriosam consequatur.",
                'added_by' => User::role('admin')->first()->id,
                'category_id' => Category::inRandomOrder()->first()->id,
                'supplier_id' => Supplier::inRandomOrder()->first()->id,
                'weight' => $weight,
                'weight_unit' => $weightUnit,
                'barcode' => rand(1000000, 9999999),
                "box_low_stock_quantity" => 10,
                "low_stock_quantity" => 10,
                'is_box' => true,
                'pcs_per_box' => $pcsPerBox,
                'box_price' => $boxPrice,
                'box_quantity' => $boxQty,
                'quantity' => $pcsPerBox * $boxQty,
                "num_of_sales" => rand(1, 100),
                'purchase_price' => $price,
                'price' => $price + 10000,
                'min_sell_price' => $price + 5000,
                'expire_at' => Carbon::now()->addYears(rand(1, 3)),
            ]);

            $path = "/images/altunsa/" . $item['image'];
            $product->addMedia(public_path() . $path)->preservingOriginal()->usingName($product->name)->toMediaCollection();

            $this->purchase($product);
        }
    }
    private function purchase($product)
    {
        $purchase = Purchase::create([
            "user_id" => 1,
            "supplier_id" => $product->supplier_id,
            "paid" => 0,
            "due" => $product->purchase_price,
        ]);
        $purchase->history()->create([
            "amount_paid" => $product->purchase_price,
            "date" => now(),
            "supplier_id" => $product->supplier_id,
            "user_id" => 1,
            "safe_id" => null,
            "usd_rate" => 148.7,
            "exchange_type" => "USD",
        ]);
    }
}
