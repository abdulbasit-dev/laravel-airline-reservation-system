<?php

namespace App\Http\Controllers;

use App\Models\ExpenseTag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\GeneralExport;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use Illuminate\Support\Facades\Validator;

class ExpenseTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //check permission
        $this->authorize("expenseTag_view");
        if ($request->ajax()) {
            $data = ExpenseTag::query()
                ->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action', function ($row) {
                $td = '<td>';
                $td .= '<div class="d-flex">';
                     $td .= '<button type="button" class="btn btn-sm btn-info waves-effect waves-light me-1" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-url="' . route('expense-tags.update', $row->id).'" data-bs-name="'.$row->name.'">'. __('buttons.edit') .'</button>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('expense-tags.destroy', $row->id). '"  class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>';
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

        return view('expense-tags.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //check permission
        $this->authorize("expenseTag_add");

        return view('expense-tags.create');
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
        $this->authorize("expenseTag_add");
        //validation
        $validator = Validator::make($request->all(), [
            "name" => ['required','string'],
        ]);
        
        
        try {
            $validator->validate();
            ExpenseTag::create(["name"=>$request->name]);

            return redirect()->route('expense-tags.index')->with([
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExpenseTag  $expenseTag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpenseTag $expenseTag)
    {
        //check permission
        $this->authorize("expenseTag_edit");

        $validator = Validator::make($request->all(), [
            "name" => ['required','string'],
        ]);
        
        
        try {
            $validator->validate();
            $expenseTag->update(["name"=>$request->name]);

            return redirect()->route('expense-tags.index')->with([
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpenseTag  $expenseTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenseTag $expenseTag)
    {
        //check permission
        $this->authorize("expenseTag_delete");

        $expenseTag->delete();
        return redirect()->route('expense-tags.index');
    }

    public function export()
    {
        //check permission
        $this->authorize("expenseTag_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "expense_tags";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = ExpenseTag::all();

        // create file name  
        $fileName = "expenseTag_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

        return Excel::download(new GeneralExport($query, $headers), $fileName);
    }

}