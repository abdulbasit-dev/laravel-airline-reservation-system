<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\GeneralExport;
use App\Models\Category;
use App\Models\Safe;
use App\Models\Setting;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //check permission
        $this->authorize("product_view");

        if ($request->ajax()) {
            $data = Product::query()
                ->get();
            return Datatables::of($data)->addIndexColumn()
                ->setRowClass(function ($data) {
                    return 'align-middle';
                })
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('products.show', $row->id) . '" type="button" class="btn btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                    $td .= '<a href="' . route('products.edit', $row->id) . '" type="button" class="btn btn-sm btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('products.destroy', $row->id) . '"  class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->addColumn('image', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex align-items-center">';
                    $td .= '<img src="' . getFile($row) . '" class="img-thumbnail avatar-md">';
                    $td .= '<span class="ms-2">' . $row->name . '</span>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('created_at', function ($row) {
                    return formatDateWithTimezone($row->created_at);
                })
                ->editColumn('expire_at', function ($row) {
                    // check if one month remain to expire 
                    $diff = getDayDiff($row->expire_at);
                    if ($diff <= 30 && $diff > 0) {
                        return '<span class="badge badge-pill badge-soft-warning font-size-12">' . formatDateWithTimezone($row->expire_at) . '</span>';
                    } elseif ($diff <= 0) {
                        return '<span class="badge badge-pill badge-soft-danger font-size-12">' . formatDateWithTimezone($row->expire_at) . '</span>';
                    } else {
                        return formatDateWithTimezone($row->expire_at);
                    }
                })
                ->rawColumns(['action', 'image', 'expire_at'])
                ->make(true);
        }

        return view('products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //check permission
        $this->authorize("product_add");

        $suppliers = Supplier::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');

        return view('products.create', compact('suppliers', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //check permission
        $this->authorize("product_add");

        try {
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->supplier_id = $request->supplier;
            $product->category_id = $request->category;
            $product->barcode = $request->barcode;
            $product->low_stock_quantity = $request->low_stock_quantity;
            $product->expire_at = $request->expire_at;
            $product->added_by = auth()->id();

            if ($request->is_box == "true") {
                $product->is_box = true;
                $product->box_quantity = $request->box_quantity;
                $product->box_price = $request->box_price;
                $product->pcs_per_box = $request->pcs_per_box;

                $product->quantity = $request->pcs_per_box * $request->box_quantity;
                $product->price =  $request->price;
            } else {
                $product->quantity = $request->quantity;
                $product->price = $request->price;
                $product->purchase_price = $request->price;
            }

            $product->save();

            // $product->purchase()->create([
            //     "product_id" => $product->id,
            //     "supplier_id" => $product->supplier_id,
            //     "paid" => 0,
            //     "due" => $product->purchase_price ?? $request->box_price,
            // ]);

            if ($request->has('file')) {
                // get file name from requets and find this file in the storage
                $filePath = storage_path('tmp/uploads/' . $request->file);

                // attach image to product
                // this will move the file from its current path to the storage path
                $product->addMedia($filePath)->usingName($request->name)->toMediaCollection();
            }

            return redirect()->route('products.index')->with([
                "message" =>  __('messages.success'),
                "icon" => "success",
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                "message" =>  $e->getMessage(),
                "icon" => "error",
            ]);
        }
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

        // product expire diffrence in days
        $diff = getDayDiff($product->expire_at);
        $preExpireWarining = Setting::where('key', 'pre_expire_warning')->first()->value ?? config('app.pre_expire_warning');

        return view('products.show', compact("product", "diff", "preExpireWarining"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //check permission
        $this->authorize("product_edit");

        $suppliers = Supplier::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');

        return view('products.edit', compact('product', 'suppliers', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //check permission
        $this->authorize("product_edit");

        try {
            $product->name = $request->name;
            $product->description = $request->description;
            $product->supplier_id = $request->supplier;
            $product->category_id = $request->category;
            $product->barcode = $request->barcode;
            $product->low_stock_quantity = $request->low_stock_quantity;
            $product->expire_at = $request->expire_at;
            $product->added_by = auth()->id();

            if (
                $request->is_box == "true"
            ) {
                $product->is_box = true;
                $product->box_quantity = $request->box_quantity;
                $product->box_price = $request->box_price;
                $product->pcs_per_box = $request->pcs_per_box;

                $product->quantity = $request->pcs_per_box * $request->box_quantity;
                $product->price =  $request->price;
            } else {
                $product->quantity = $request->quantity;
                $product->price = $request->price;
            }

            if ($request->has('file')) {
                // delete old product image
                $mediaItems = $product->getMedia();

                if (count($mediaItems) > 0) {
                    $mediaItems->each(function ($item, $key) {
                        $item->delete();
                    });
                }

                // get file name from requets and find this file in the storage
                $filePath = storage_path('tmp/uploads/' . $request->file);

                // attach image to product
                // this will move the file from its current path to the storage path
                $product->addMedia($filePath)->usingName($request->name)->toMediaCollection();
            }

            $product->save();

            return redirect()->route('products.index')->with([
                "message" =>  __('messages.success'),
                "icon" => "success",
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                "message" =>  $e->getMessage(),
                "icon" => "error",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //check permission
        $this->authorize("product_delete");

        $product->delete();
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function bySupplier(request $request)
    {
        //check permission
        $this->authorize("product_view");
        //validation
        $validator = Validator::make($request->all(), [
            "supplier_id" => ['required', 'exists:suppliers,id'],
        ]);

        if ($validator->fails()) {
            return ['data' => __('not_found')];
        }

        return ["data" => Product::where('supplier_id', $request->supplier_id)->get(['id', 'name as text', 'description', 'purchase_box_price', 'purchase_price'])];
    }
}
