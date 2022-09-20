<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plane;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\GeneralExport;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class PlaneController extends Controller
{
    public function index(Request $request)
    {
        //check permission
        $this->authorize("plane_view");

        if ($request->ajax()) {
            $data = Plane::query()
                ->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action', function ($row) {
                $td = '<td>';
                $td .= '<div class="d-flex">';
                     $td .= '<a href="' . route('planes.show', $row->id) . '" type="button" class="btn btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                     $td .= '<a href="' . route('planes.edit', $row->id) . '" type="button" class="btn btn-sm btn-info waves-effect waves-light me-1">' . __('buttons.edit') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('planes.destroy', $row->id). '"  class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>';
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

        return view('planes.index');
    }

    public function create()
    {
        //check permission
        $this->authorize("plane_add");

        return view('planes.create');
    }

    public function store(PlaneRequest $request)
    {
        //check permission
        $this->authorize("plane_add");

        try {
            $validated = $request->validated();
            Plane::create($validated);

            return redirect()->route('planes.index')->with([
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

    public function show(Plane $plane)
    {
        //check permission
        $this->authorize("plane_view");

        return view('planes.show', compact("plane"));
    }

    public function edit(Plane $plane)
    {
        //check permission
        $this->authorize("plane_edit");
        
        return view('planes.edit', compact("plane"));
    }

    public function update(PlaneRequest $request, Plane $plane)
    {
        //check permission
        $this->authorize("plane_edit");

        try {
            $validated = $request->validated();
            $plane->update($validated);

            return redirect()->route('planes.index')->with([
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
    
    public function destroy(Plane $plane)
    {
        //check permission
        $this->authorize("plane_delete");

        $plane->delete();
        return redirect()->route('planes.index');
    }

    public function export()
    {
        //check permission
        $this->authorize("plane_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "planes";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = Plane::all();

        // create file name  
        $fileName = "plane_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

        return Excel::download(new GeneralExport($query, $headers), $fileName);
    }

    public function import(Request $request)
    {
        //check permission
        $this->authorize("plane_import");

        //get file name from requets and find this file in the storage
        $filePath = storage_path('tmp/uploads/' . $request->file);

        // import to database
        Excel::import(new PlanesImport, $filePath);

        // delete temp file after uploading 
        unlink($filePath);

        return redirect()->route('planes.index')->with([
            "message" =>  __('messages.import'),
            "icon" => "success",
        ]);
    }
}