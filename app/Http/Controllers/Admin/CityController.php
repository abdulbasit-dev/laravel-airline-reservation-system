<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class CityController extends Controller
{
    public function index(Request $request)
    {
        //check permission
        $this->authorize("city_view");

        if ($request->ajax()) {
            $data = City::query();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action', function ($row) {
                $td = '<td>';
                $td .= '<div class="d-flex">';
                     $td .= '<a href="' . route('citys.show', $row->id) . '" type="button" class="btn btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                     $td .= '<a href="' . route('citys.edit', $row->id) . '" type="button" class="btn btn-sm btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('citys.destroy', $row->id). '"  class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>';
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

        return view('citys.index');
    }

    public function create()
    {
        //check permission
        $this->authorize("city_add");

        return view('citys.create');
    }

    public function store(CityRequest $request)
    {
        //check permission
        $this->authorize("city_add");

        try {
            $validated = $request->validated();
            City::create($validated);

            return redirect()->route('citys.index')->with([
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

    public function show(City $city)
    {
        //check permission
        $this->authorize("city_view");

        return view('citys.show', compact("city"));
    }

    public function edit(City $city)
    {
        //check permission
        $this->authorize("city_edit");
        
        return view('citys.edit', compact("city"));
    }

    public function update(CityRequest $request, City $city)
    {
        //check permission
        $this->authorize("city_edit");

        try {
            $validated = $request->validated();
            $city->update($validated);

            return redirect()->route('citys.index')->with([
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
    
    public function destroy(City $city)
    {
        //check permission
        $this->authorize("city_delete");

        $city->delete();
        return redirect()->route('citys.index');
    }

    public function export()
    {
        //check permission
        $this->authorize("city_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "citys";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = City::all();

        // create file name  
        $fileName = "city_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

        return Excel::download(new GeneralExport($query, $headers), $fileName);
    }

    public function import(Request $request)
    {
        //check permission
        $this->authorize("city_import");

        //get file name from requets and find this file in the storage
        $filePath = storage_path('tmp/uploads/' . $request->file);

        // import to database
        Excel::import(new CitysImport, $filePath);

        // delete temp file after uploading 
        unlink($filePath);

        return redirect()->route('citys.index')->with([
            "message" =>  __('messages.import'),
            "icon" => "success",
        ]);
    }
}