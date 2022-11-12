<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        //check permission
        $this->authorize("country_view");

        if ($request->ajax()) {
            $data = Country::query();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action', function ($row) {
                $td = '<td>';
                $td .= '<div class="d-flex">';
                     $td .= '<a href="' . route('countrys.show', $row->id) . '" type="button" class="btn btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                     $td .= '<a href="' . route('countrys.edit', $row->id) . '" type="button" class="btn btn-sm btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('countrys.destroy', $row->id). '"  class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>';
                $td .= "</div>";
                $td .= "</td>";
                return $td;
            })
            // ->editColumn('created_at', function ($row) {
            //     return formatDate($row->created_at);
            // })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('countrys.index');
    }

    public function create()
    {
        //check permission
        $this->authorize("country_add");

        return view('countrys.create');
    }

    public function store(CountryRequest $request)
    {
        //check permission
        $this->authorize("country_add");

        try {
            $validated = $request->validated();
            Country::create($validated);

            return redirect()->route('countrys.index')->with([
                "message" =>  __('messages.success'),
                "icon" => "success",
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                "message" =>  $th->getMessage(),
                "icon" => "error",
            ]);
        }
    }

    public function show(Country $country)
    {
        //check permission
        $this->authorize("country_view");

        return view('countrys.show', compact("country"));
    }

    public function edit(Country $country)
    {
        //check permission
        $this->authorize("country_edit");
        
        return view('countrys.edit', compact("country"));
    }

    public function update(CountryRequest $request, Country $country)
    {
        //check permission
        $this->authorize("country_edit");

        try {
            $validated = $request->validated();
            $country->update($validated);

            return redirect()->route('countrys.index')->with([
                "message" =>  __('messages.update'),
                "icon" => "success",
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                "message" =>  $th->getMessage(),
                "icon" => "error",
            ]);
        }
    }
    
    public function destroy(Country $country)
    {
        //check permission
        $this->authorize("country_delete");

        $country->delete();
        return redirect()->route('countrys.index');
    }

    public function export()
    {
        //check permission
        $this->authorize("country_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "countrys";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = Country::all();

        // create file name  
        $fileName = "country_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

        return Excel::download(new GeneralExport($query, $headers), $fileName);
    }

    public function import(Request $request)
    {
        //check permission
        $this->authorize("country_import");

        //get file name from requets and find this file in the storage
        $filePath = storage_path('tmp/uploads/' . $request->file);

        // import to database
        Excel::import(new CountrysImport, $filePath);

        // delete temp file after uploading 
        unlink($filePath);

        return redirect()->route('countrys.index')->with([
            "message" =>  __('messages.import'),
            "icon" => "success",
        ]);
    }
}