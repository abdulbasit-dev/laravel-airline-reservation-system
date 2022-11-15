<?php

namespace App\Http\Controllers\Admin;

use App\Models\Airport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AirportRequest;
use App\Models\City;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class AirportController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Airport::query();
            return Datatables::of($data)->addIndexColumn()
                ->setRowClass(fn ($row) => 'align-middle')
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('airports.edit', $row->id) . '" type="button" class="btn btn-sm  btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('airports.destroy', $row->id) . '"  class="btn btn-sm  btn-danger delete-btn">' . __('buttons.delete') . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('city.name', function ($row) {
                    return '<span class="badge badge-pill badge-soft-info font-size-14">' . $row->city->name . '</span>';
                })
                ->editColumn('created_at', fn ($row) => formatDate($row->created_at))
                ->rawColumns(['action', 'city.name'])
                ->make(true);
        }

        return view('admin.airports.index');
    }

    public function create()
    {
        $cities = City::all()->pluck('name', 'id');
        return view('admin.airports.create', compact('cities'));
    }

    public function store(AirportRequest $request)
    {
        try {
            $validated = $request->validated();
            Airport::create($validated);

            return redirect()->route('airports.index')->with([
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

    public function edit(Airport $airport)
    {
        $cities = City::all()->pluck('name', 'id');
        return view('admin.airports.edit', compact('cities', 'airport'));
    }

    public function update(AirportRequest $request, Airport $airport)
    {
        try {
            $validated = $request->validated();
            $airport->update($validated);

            return redirect()->route('airports.index')->with([
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

    public function destroy(Airport $airport)
    {
        $airport->delete();
        return redirect()->route('airports.index');
    }

    public function export()
    {
        // get the heading of your file from the table or you can created your own heading
        $table = "airports";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = Airport::all();

        // create file name  
        $fileName = "airport_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

        return Excel::download(new GeneralExport($query, $headers), $fileName);
    }

    public function import(Request $request)
    {
        //get file name from requets and find this file in the storage
        $filePath = storage_path('tmp/uploads/' . $request->file);

        // import to database
        Excel::import(new AirportsImport, $filePath);

        // delete temp file after uploading 
        unlink($filePath);

        return redirect()->route('airports.index')->with([
            "message" =>  __('messages.import'),
            "icon" => "success",
        ]);
    }
}
