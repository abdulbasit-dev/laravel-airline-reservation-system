<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use App\Exports\GeneralExport;
use App\Imports\BrandsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //check permission
        $this->authorize("brand_view"); 

        if ($request->ajax()) {
            $data = Brand::all();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('brands.edit', $row->id) . '" type="button" class="btn btn-sm btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('brands.destroy', $row->id) . '"  class="btn btn-danger btn-sm delete-btn">' . __('buttons.delete') . '</a>';
                    $td .= '</div>';
                    $td .= '</td>';
                    return $td;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('brands.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //check permission
        $this->authorize("brand_add");

        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        //check permission
        $this->authorize("brand_add");

        try {
            $validated = $request->validated();
            Brand::create($validated);

            return redirect()->route('brands.index')->with([
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
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //check permission
        $this->authorize("brand_view");

        return view('brands.show', compact("brand"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //check permission
        $this->authorize("brand_edit");

        return view('brands.edit', compact("brand"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        //check permission
        $this->authorize("brand_edit");

        try {
            $validated = $request->validated();
            $brand->update($validated);

            return redirect()->route('brands.index')->with([
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
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //check permission
        $this->authorize("brand_delete");

        $brand->delete();
        return redirect()->route('categories.index');
    }

    public function export()
    {
        //check permission
        $this->authorize("brand_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "brands";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = Brand::all();

        // create file name  
        $fileName = "brands_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

        return Excel::download(new GeneralExport($query, $headers), $fileName);
    }

    public function import(Request $request)
    {
        //check permission
        $this->authorize("brand_import");

        //get file name from requets and find this file in the storage
        $filePath = storage_path('tmp/uploads/' . $request->file);

        // import to database
        Excel::import(new BrandsImport, $filePath);

        // delete temp file after uploading 
        unlink($filePath);

        return redirect()->route('brands.index')->with([
            "message" =>  __('messages.import'),
            "icon" => "success",
        ]);
    }
}
