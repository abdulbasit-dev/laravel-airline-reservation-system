<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use Illuminate\Http\Response;
use Arr;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //check permission
        $this->authorize("product_view");

        $searchQuery = request()->all();
        $limit = Arr::get($searchQuery, 'limit', static::ITEM_PER_PAGE);
        $keyword = Arr::get($searchQuery, 'keyword', '');
        $categoryId = Arr::get($searchQuery, 'category_id', '');
        $supplierId = Arr::get($searchQuery, 'supplier_id', '');
        $barcode = Arr::get($searchQuery, 'barcode', '');
        // $brandId = Arr::get($searchQuery, 'brand_id', '');

        $products = Product::query()
            ->select([
                "id",
                "name",
                "barcode",
                "description",
                "is_box",
                "box_price",
                "box_quantity",
                "price",
                "quantity",
            ])
            ->when($keyword, function ($query) use ($keyword) {
                return $query->where('name', 'like', "%{$keyword}%")
                        ->orWhere('barcode', 'like', "%{$keyword}%");
            })
            ->when($supplierId, function ($query) use ($supplierId) {
                return $query->whereSupplierId($supplierId);
            })
            ->when($categoryId, function ($query) use ($categoryId) {
                return $query->whereCategoryId($categoryId);
            })
            ->when($barcode, function ($query) use ($barcode) {
                return $query->whereBarcode($barcode);
            })
            ->paginate($limit);

        return new ProductCollection($products);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //check permission
        $this->authorize("product_view");

        $product['image'] = getFile($product);
        return $this->josnResponse(true, __('api.show_resource_info', ['resource' => __('attributes.product')]), Response::HTTP_OK, $product);
    }
}
