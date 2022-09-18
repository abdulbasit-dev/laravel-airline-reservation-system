<?php

namespace App\Http\Controllers;

use App\Models\CarExpense;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\GeneralExport;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class CarExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //check permission
        $this->authorize("carExpense_view");

        $data = CarExpense::query()
            ->with('car:id,model,deleted_at', 'user:id,name')
            ->get();

        // return $data;    

        if ($request->ajax()) {
            $data = CarExpense::query()
                ->with('car', 'user:id,name')
                ->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('car-expenses.show', $row->id) . '" type="button" class="btn btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('car-expenses.destroy', $row->id) . '"  class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('created_at', function ($row) {
                    return formatDateWithTimezone($row->created_at);
                })
                ->editColumn('price', function ($row) {
                    return formatPrice($row->price);
                })
                ->rawColumns(['action', 'car.model'])
                ->make(true);
        }

        return view('car-expenses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarExpense  $carExpense
     * @return \Illuminate\Http\Response
     */
    public function show(CarExpense $carExpense)
    {
        //check permission
        $this->authorize("carExpense_view");

        $carExpense->load('user:id,name', 'car');
        return view('car-expenses.show', compact("carExpense"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarExpense  $carExpense
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarExpense $carExpense)
    {
        //check permission
        $this->authorize("carExpense_delete");

        $carExpense->delete();
        return redirect()->route('car-expenses.index');
    }

    public function export()
    {
        //check permission
        $this->authorize("carExpense_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "car-expenses";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = CarExpense::all();

        // create file name  
        $fileName = "carExpense_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

        return Excel::download(new GeneralExport($query, $headers), $fileName);
    }
}
