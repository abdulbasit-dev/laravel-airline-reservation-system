<?php

namespace App\Http\Controllers\Admin;

use App\Models\Flight;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\GeneralExport;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class FlightController extends Controller
{
    public function index(Request $request)
    {
        //check permission
        // $this->authorize("flight_view");

        if ($request->ajax()) {
            $data = Flight::query()
                ->get();
            return Datatables::of($data)->addIndexColumn()
                ->setRowClass(fn ($row) => 'align-middle')
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('flights.show', $row->id) . '" type="button" class="btn btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                    $td .= '<a href="' . route('flights.edit', $row->id) . '" type="button" class="btn btn-sm btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('flights.destroy', $row->id) . '"  class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('flight_number', function ($row) {
                    return '<span class="badge badge-pill badge-soft-primary font-size-13">' . $row->flight_number . '</span>';
                })
                ->editColumn('plane.code', function ($row) {
                    return '<span class="badge badge-pill badge-soft-primary font-size-13">' . $row->plane->code . '</span>';
                })
                ->editColumn('route', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="">';
                    $td .= '<p class="">' . __('translation.flight.origin') . ': ' . airportName($row->origin->name) . '</p>';
                    $td .= '<p class="">' . __('translation.flight.destination') . ': ' . airportName($row->origin->name) . '</p>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('departure', fn ($row) => formatDateWithTimezone($row->created_at))
                ->editColumn('arrival', fn ($row) => formatDateWithTimezone($row->created_at))
                ->rawColumns(['action', 'flight_number', 'plane.code',  'route'])
                ->make(true);
        }

        return view('admin.flights.index');
    }

    public function create()
    {
        //check permission
        $this->authorize("flight_add");

        return view('flights.create');
    }

    public function store(FlightRequest $request)
    {
        //check permission
        $this->authorize("flight_add");

        try {
            $validated = $request->validated();
            Flight::create($validated);

            return redirect()->route('flights.index')->with([
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

    public function show(Flight $flight)
    {
        //check permission
        $this->authorize("flight_view");

        return view('flights.show', compact("flight"));
    }

    public function edit(Flight $flight)
    {
        //check permission
        $this->authorize("flight_edit");

        return view('flights.edit', compact("flight"));
    }

    public function update(FlightRequest $request, Flight $flight)
    {
        //check permission
        $this->authorize("flight_edit");

        try {
            $validated = $request->validated();
            $flight->update($validated);

            return redirect()->route('flights.index')->with([
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

    public function destroy(Flight $flight)
    {
        //check permission
        $this->authorize("flight_delete");

        $flight->delete();
        return redirect()->route('flights.index');
    }

    public function export()
    {
        //check permission
        $this->authorize("flight_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "flights";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = Flight::all();

        // create file name  
        $fileName = "flight_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

        return Excel::download(new GeneralExport($query, $headers), $fileName);
    }

    public function import(Request $request)
    {
        //check permission
        $this->authorize("flight_import");

        //get file name from requets and find this file in the storage
        $filePath = storage_path('tmp/uploads/' . $request->file);

        // import to database
        Excel::import(new FlightsImport, $filePath);

        // delete temp file after uploading 
        unlink($filePath);

        return redirect()->route('flights.index')->with([
            "message" =>  __('messages.import'),
            "icon" => "success",
        ]);
    }
}
