<?php

namespace App\Http\Controllers;

use App\Models\ReturnProduct;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\GeneralExport;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class ReturnProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //check permission
        $this->authorize("returnProduct_view");

        if ($request->ajax()) {
            $data = ReturnProduct::query()
                ->with('client:id,name', 'product:id,name', 'user:id,name')
                ->get();
            return Datatables::of($data)->addIndexColumn()
                ->editColumn('return_date', function ($row) {
                    return formatDate($row->return_date);
                })
                ->editColumn('return_price', function ($row) {
                    return formatPrice($row->return_price);
                })
                ->editColumn('estimate_price', function ($row) {
                    return formatPrice($row->estimate_price);
                })
                ->editColumn('type', function ($row) {
                    return $row->type? __('translation.pc') : __('translation.box');
                })
                ->addColumn('image', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex align-items-cente">';
                    $td .= '<img src="' . getFile($row->product) . '" class="img-thumbnail" style="width:70px;height:70px;">';
                    $td .= '<span class="ms-2">' . $row->product->name . '</span>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->rawColumns(['image'])
                ->make(true);
        }

        return view('return-products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //check permission
        $this->authorize("returnProduct_add");

        return view('return-products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReturnProductRequest $request)
    {
        //check permission
        $this->authorize("returnProduct_add");

        try {
            $validated = $request->validated();
            ReturnProduct::create($validated);

            return redirect()->route('returnProducts.index')->with([
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
     * @param  \App\Models\ReturnProduct  $returnProduct
     * @return \Illuminate\Http\Response
     */
    public function show(ReturnProduct $returnProduct)
    {
        //check permission
        $this->authorize("returnProduct_view");

        return view('return-products.show', compact("returnProduct"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReturnProduct  $returnProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(ReturnProduct $returnProduct)
    {
        //check permission
        $this->authorize("returnProduct_edit");

        return view('return-products.edit', compact("returnProduct"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReturnProduct  $returnProduct
     * @return \Illuminate\Http\Response
     */
    public function update(ReturnProductRequest $request, ReturnProduct $returnProduct)
    {
        //check permission
        $this->authorize("returnProduct_edit");

        try {
            $validated = $request->validated();
            $returnProduct->update($validated);

            return redirect()->route('returnProducts.index')->with([
                "message" =>  __('messages.update'),
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
     * @param  \App\Models\ReturnProduct  $returnProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReturnProduct $returnProduct)
    {
        //check permission
        $this->authorize("returnProduct_delete");

        $returnProduct->delete();
        return redirect()->route('returnProducts.index');
    }

    public function export()
    {
        //check permission
        $this->authorize("returnProduct_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "returnProducts";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = ReturnProduct::all();

        // create file name  
        $fileName = "returnProduct_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

        return Excel::download(new GeneralExport($query, $headers), $fileName);
    }

    public function import(Request $request)
    {
        //check permission
        $this->authorize("returnProduct_import");

        //get file name from requets and find this file in the storage
        $filePath = storage_path('tmp/uploads/' . $request->file);

        // import to database
        Excel::import(new ReturnProductsImport, $filePath);

        // delete temp file after uploading 
        unlink($filePath);

        return redirect()->route('returnProducts.index')->with([
            "message" =>  __('messages.import'),
            "icon" => "success",
        ]);
    }
}
