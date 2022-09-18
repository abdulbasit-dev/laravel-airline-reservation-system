<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Visit;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\VisitExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //check permission
        $this->authorize("visit_view");

        if ($request->ajax()) {
            $data = Visit::query()
                ->with('user:id,name','client:id,name');
                if(strtotime($request->startDate) && strtotime($request->endDate)){
                    $data->whereBetween('created_at',[$request->startDate,$request->endDate]);
                }
                if(is_numeric($request->user)){
                    $data->where('user_id',$request->user);
                }
                if(is_numeric($request->client)){
                    $data->where('client_id',$request->client);
                }
                $data->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action', function ($row) {
                $td = '<td>';
                $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('visits.show', $row->id) . '" type="button" class="btn btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('visits.destroy', $row->id). '"  class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>';
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

        return view('visits.index',["visits"=>Visit::all()->unique('client_id'),"users"=>User::role(['driver', 'sale-representative'])->get()]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function show(Visit $visit)
    {
        //check permission
        $this->authorize("visit_view");

        return view('visits.show', compact("visit"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visit $visit)
    {
        //check permission
        $this->authorize("visit_delete");

        $visit->delete();
        return redirect()->route('visits.index');
    }

    public function export()
    {
        //check permission
        $this->authorize("visit_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "visits";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = Visit::with('user:id,name','client:id,name')->get();

        // create file name  
        $fileName = "visit_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

        return Excel::download(new VisitExport($query, $headers), $fileName);
    }

}