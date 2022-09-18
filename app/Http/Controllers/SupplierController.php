<?php

namespace App\Http\Controllers;

use App\Exports\GeneralExport;
use App\Http\Requests\SupplierRequest;
use App\Imports\SuppliersImport;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;


class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //check permission
        $this->authorize("supplier_view");

        if ($request->ajax()) {
            $data = Supplier::query()
                ->orderByDesc('created_at')
                ->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('suppliers.edit', $row->id) . '" type="button" class="btn btn-sm btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('suppliers.destroy', $row->id) . '"  class="btn btn-danger btn-sm delete-btn">' . __('buttons.delete') . '</a>';
                    $td .= '</div>';
                    $td .= '</td>';
                    return $td;
                })
                // ->editColumn('created_at', function ($row) {
                //     return formatDate($row->created_at);
                // })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('suppliers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //check permission
        $this->authorize("supplier_add");

        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierRequest $request)
    {
        //check permission
        $this->authorize("supplier_add");

        try {
            $validated = $request->validated();
            Supplier::create($validated);

            return redirect()->route('suppliers.index')->with([
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //check permission
        $this->authorize("supplier_edit");

        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(SupplierRequest $request, Supplier $supplier)
    {
        //check permission
        $this->authorize("supplier_edit");

        try {

            $validated = $request->validated();
            $supplier->update($validated);

            return redirect()->route('suppliers.index')->with([
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
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //check permission
        $this->authorize("supplier_delete");

        $supplier->delete();
        return redirect()->route('suppliers.index');
    }

    public function export()
    {
        //check permission
        $this->authorize("supplier_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "suppliers";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = Supplier::all();

        // create file name  
        $fileName = "suppliers_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

        return Excel::download(new GeneralExport($query, $headers), $fileName);
    }

    public function import(Request $request)
    {
        //check permission
        $this->authorize("supplier_import");

        //get file name from requets and find this file in the storage
        $filePath = storage_path('tmp/uploads/' . $request->file);

        // import to database
        Excel::import(new SuppliersImport, $filePath);

        // delete temp file after uploading 
        unlink($filePath);

        return redirect()->route('suppliers.index')->with([
            "message" =>  __('messages.import'),
            "icon" => "success",
        ]);
    }
}
