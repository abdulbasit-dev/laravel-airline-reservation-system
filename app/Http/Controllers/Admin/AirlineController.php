<?php

namespace App\Http\Controllers\Admin;

use App\Models\Airline;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\GeneralExport;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class AirlineController extends Controller
{
    public function index(Request $request)
    {
        //check permission
        $this->authorize("airline_view");

        if ($request->ajax()) {
            $data = Airline::query()
                ->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action', function ($row) {
                $td = '<td>';
                $td .= '<div class="d-flex">';
                     $td .= '<a href="' . route('airlines.show', $row->id) . '" type="button" class="btn btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                     $td .= '<a href="' . route('airlines.edit', $row->id) . '" type="button" class="btn btn-sm btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('airlines.destroy', $row->id). '"  class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>';
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

        return view('airlines.index');
    }

    public function create()
    {
        //check permission
        $this->authorize("airline_add");

        return view('airlines.create');
    }

    public function store(AirlineRequest $request)
    {
        //check permission
        $this->authorize("airline_add");

        try {
            $validated = $request->validated();
            Airline::create($validated);

            return redirect()->route('airlines.index')->with([
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

    public function show(Airline $airline)
    {
        //check permission
        $this->authorize("airline_view");

        return view('airlines.show', compact("airline"));
    }

    public function edit(Airline $airline)
    {
        //check permission
        $this->authorize("airline_edit");
        
        return view('airlines.edit', compact("airline"));
    }

    public function update(AirlineRequest $request, Airline $airline)
    {
        //check permission
        $this->authorize("airline_edit");

        try {
            $validated = $request->validated();
            $airline->update($validated);

            return redirect()->route('airlines.index')->with([
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
    
    public function destroy(Airline $airline)
    {
        //check permission
        $this->authorize("airline_delete");

        $airline->delete();
        return redirect()->route('airlines.index');
    }

    public function export()
    {
        //check permission
        $this->authorize("airline_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "airlines";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = Airline::all();

        // create file name  
        $fileName = "airline_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

        return Excel::download(new GeneralExport($query, $headers), $fileName);
    }

    public function import(Request $request)
    {
        //check permission
        $this->authorize("airline_import");

        //get file name from requets and find this file in the storage
        $filePath = storage_path('tmp/uploads/' . $request->file);

        // import to database
        Excel::import(new AirlinesImport, $filePath);

        // delete temp file after uploading 
        unlink($filePath);

        return redirect()->route('airlines.index')->with([
            "message" =>  __('messages.import'),
            "icon" => "success",
        ]);
    }
}