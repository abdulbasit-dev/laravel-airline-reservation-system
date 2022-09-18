<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseTag;
use App\Models\Safe;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExpenseExport;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use App\Http\Requests\ExpenseRequest;
use Illuminate\Support\Carbon;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //check permission
        $this->authorize("expense_view");

        if ($request->ajax()) {
            $data = Expense::query()
                ->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action', function ($row) {
                $td = '<td>';
                $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('expenses.show', $row->id) . '" type="button" class="btn btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('expenses.destroy', $row->id). '"  class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>';
                $td .= "</div>";
                $td .= "</td>";
                return $td;
            })
            ->editColumn('safe_id', function ($row) {
                $td = '<td>';
                $td .= '<div class="d-flex">';
                    $td .= '<button type="button" class="btn btn-sm btn-success waves-effect waves-light me-1">' .$row->safe->name. '</button></a>';
                $td .= "</div>";
                $td .= "</td>";
                return $td;
            })
            ->editColumn('created_at', function ($row) {
                return formatDate($row->created_at);
            })
            ->rawColumns(['action','safe_id'])
            ->make(true);
        }

        return view('expenses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //check permission
        $this->authorize("expense_add");

        return view('expenses.create',['tags'=>ExpenseTag::select('id','name')->get(),"safes"=>safe::select('id','name')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenseRequest $request)
    {
        //check permission
        $this->authorize("expense_add");

        try {
            $validated = $request->validated();
            $validated['user_id'] = auth()->user()->id;
            
            //remove image from request
            unset($validated['image']);
            
            $expense = Expense::create($validated);
            
            $expense->safe->transactions()->create([
                "transaction_by"=>auth()->id(),
                "action_by"=>auth()->id(),
                "type"=>"withdraw",
                "amount"=>$validated['price'],
                "note"=>"
                TODO                
                ",
                "date"=>now()
            ]);

            $expense->safe->decrement("available_money",$validated['price']);


            // save expanse image 
            $expense->addMediaFromRequest('image')->usingName($request->title.'_'.date("Y-m-d"))->toMediaCollection();
            
            return redirect()->route('expenses.index')->with([
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
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //check permission
        $this->authorize("expense_view");

        $expense->load('tag:id,name');
        return view('expenses.show', compact("expense"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //check permission
        $this->authorize("expense_delete");

        $expense->delete();
        return redirect()->route('expenses.index');
    }

    public function export()
    {
        //check permission
        $this->authorize("expense_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "expenses";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = Expense::all();

        // create file name  
        $fileName = "expense_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

        return Excel::download(new ExpenseExport($query, $headers), $fileName);
    }

    public function import(Request $request)
    {
        //check permission
        $this->authorize("expense_import");

        //get file name from requets and find this file in the storage
        $filePath = storage_path('tmp/uploads/' . $request->file);

        // import to database
        Excel::import(new ExpensesImport, $filePath);

        // delete temp file after uploading 
        unlink($filePath);

        return redirect()->route('expenses.index')->with([
            "message" =>  __('messages.import'),
            "icon" => "success",
        ]);
    }
}