<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use App\Exports\GeneralExport;
use App\Models\VisitDescription;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class VisitDescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //check permission
        $this->authorize("visitDescription_view");

        if ($request->ajax()) {
            $data = VisitDescription::query()
                ->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action', function ($row) {
                $td = '<td>';
                $td .= '<div class="d-flex">';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('visit-description.destroy', $row->id). '"  class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>';
                $td .= "</div>";
                $td .= "</td>";
                return $td;
            })
            ->editColumn('created_at', function ($row) {
                return formatDate($row->created_at);
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('visit-description.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //check permission
        $this->authorize("visitDescription_add");

        //validation
        $validator = Validator::make($request->all(), [
            "title" => ['required','string'],
        ]);
        
        
        try {
            $validator->validate();
            VisitDescription::create(["title"=>$request->title]);

            return redirect()->route('visit-description.index')->with([
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VisitDescription  $VisitDescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(VisitDescription $VisitDescription)
    {
        //check permission
        $this->authorize("visitDescription_delete");

        $VisitDescription->delete();
        return redirect()->route('visit-description.index');
    }

    public function export()
    {
        //check permission
        $this->authorize("visitDescription_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "visit_descriptions";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = VisitDescription::all();

        // create file name  
        $fileName = "VisitDescription_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

        return Excel::download(new GeneralExport($query, $headers), $fileName);
    }

    public function import(Request $request)
    {
        //check permission
        $this->authorize("visitDescription_import");

        //get file name from requets and find this file in the storage
        $filePath = storage_path('tmp/uploads/' . $request->file);

        // import to database
        Excel::import(new visitDescriptionImport, $filePath);

        // delete temp file after uploading 
        unlink($filePath);

        return redirect()->route('visit-description.index')->with([
            "message" =>  __('messages.import'),
            "icon" => "success",
        ]);
    }
}