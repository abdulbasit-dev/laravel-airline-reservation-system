<?php

namespace App\Http\Controllers\Admin;

use App\Models\Airport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\GeneralExport;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class AirportController extends Controller
{
    public function index(Request $request)
    {
        //check permission
        // $this->authorize("airport_view");

        if ($request->ajax()) {
            $data = Airport::query()
                ->get();
            return Datatables::of($data)->addIndexColumn()
                ->setRowClass(fn ($row) => 'align-middle')
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('airports.show', $row->id) . '" type="button" class="btn btn-sm btn-rounded btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                    $td .= '<a href="' . route('airports.edit', $row->id) . '" type="button" class="btn btn-sm btn-rounded btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('airports.destroy', $row->id) . '"  class="btn btn-sm btn-rounded btn-danger delete-btn">' . __('buttons.delete') . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('created_at', fn ($row) => formatDate($row->created_at))
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.airports.index');
    }

    public function create()
    {
        //check permission
        $this->authorize("airport_add");

        return view('admin.airports.create');
    }

    public function store(AirportRequest $request)
    {
        //check permission
        $this->authorize("airport_add");

        try {
            $validated = $request->validated();
            Airport::create($validated);

            return redirect()->route('airports.index')->with([
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

    public function show(Airport $airport)
    {
        //check permission
        $this->authorize("airport_view");

        return view('admin.airports.show', compact("airport"));
    }

    public function edit(Airport $airport)
    {
        //check permission
        $this->authorize("airport_edit");

        return view('admin.airports.edit', compact("airport"));
    }

    public function update(AirportRequest $request, Airport $airport)
    {
        //check permission
        $this->authorize("airport_edit");

        try {
            $validated = $request->validated();
            $airport->update($validated);

            return redirect()->route('airports.index')->with([
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

    public function destroy(Airport $airport)
    {
        //check permission
        $this->authorize("airport_delete");

        $airport->delete();
        return redirect()->route('airports.index');
    }

    public function export()
    {
        //check permission
        $this->authorize("airport_export");

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
        //check permission
        $this->authorize("airport_import");

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
