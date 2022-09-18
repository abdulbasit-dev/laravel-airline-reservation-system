<?php

namespace App\Http\Controllers;

use App\Models\ClientCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\GeneralExport;
use App\Http\Requests\ClientCategoryRequest;
use App\Imports\ClientCategoriesImport;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class ClientCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //check permission
        $this->authorize("clientCategory_view");

        if ($request->ajax()) {
            $data = ClientCategory::query()
                ->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('client-categories.edit', $row->id) . '" type="button" class="btn btn-sm btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('client-categories.destroy', $row->id) . '"  class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('client-categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //check permission
        $this->authorize("clientCategory_add");

        return view('client-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientCategoryRequest $request)
    {
        //check permission
        $this->authorize("clientCategory_add");

        try {
            $validated = $request->validated();
            ClientCategory::create($validated);

            return redirect()->route('client-categories.index')->with([
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
     * @param  \App\Models\ClientCategory  $clientCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientCategory $clientCategory)
    {
        //check permission
        $this->authorize("clientCategory_edit");

        return view('client-categories.edit', compact("clientCategory"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClientCategory  $clientCategory
     * @return \Illuminate\Http\Response
     */
    public function update(ClientCategoryRequest $request, ClientCategory $clientCategory)
    {
        //check permission
        $this->authorize("clientCategory_edit");

        try {
            $validated = $request->validated();
            $clientCategory->update($validated);

            return redirect()->route('client-categories.index')->with([
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
     * @param  \App\Models\ClientCategory  $clientCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientCategory $clientCategory)
    {
        //check permission
        $this->authorize("clientCategory_delete");

        $clientCategory->delete();
        return redirect()->route('client-categories.index');
    }

    public function export()
    {
        //check permission
        $this->authorize("clientCategory_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "client_categories";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = ClientCategory::all();

        // create file name  
        $fileName = "clientCategory_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

        return Excel::download(new GeneralExport($query, $headers), $fileName);
    }

    public function import(Request $request)
    {
        //check permission
        $this->authorize("clientCategory_import");

        //get file name from requets and find this file in the storage
        $filePath = storage_path('tmp/uploads/' . $request->file);

        // import to database
        Excel::import(new ClientCategoriesImport, $filePath);

        // delete temp file after uploading 
        unlink($filePath);

        return redirect()->route('client-categories.index')->with([
            "message" =>  __('messages.import'),
            "icon" => "success",
        ]);
    }
}
