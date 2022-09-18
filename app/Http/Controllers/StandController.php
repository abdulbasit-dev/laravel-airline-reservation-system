<?php

namespace App\Http\Controllers;

use App\Models\Stand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\GeneralExport;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class StandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //check permission
        $this->authorize("stand_view");


        $data = Stand::query()
            ->with('user:id,name', 'client:id,name');
        // return $data->get();
        if ($request->ajax()) {
            $data = Stand::query()
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
                    $td .= '<a href="' . route('stands.show', $row->id) . '" type="button" class="btn btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('stands.destroy', $row->id). '"  class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>';
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

        return view('stands.index',["stands"=>Stand::all()->unique('client_id'),"users"=>User::role(['driver', 'sale-representative'])->get()]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stand  $stand
     * @return \Illuminate\Http\Response
     */
    public function show(Stand $stand)
    {
        //check permission
        $this->authorize("stand_view");

        return view('stands.show', compact("stand"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stand  $stand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stand $stand)
    {
        //check permission
        $this->authorize("stand_delete");

        $stand->delete();
        return redirect()->route('stands.index');
    }

    public function export()
    {
        //check permission
        $this->authorize("stand_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "stands";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = Stand::with('user:id,name','client:id,name')->get();

        // create file name  
        $fileName = "stand_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

        return Excel::download(new StandExport($query, $headers), $fileName);
    }

}