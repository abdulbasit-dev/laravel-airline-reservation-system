<?php

namespace App\Http\Controllers;

use App\Models\SafeTransaction;
use App\Models\Safe;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\SafeTransactionRequest;
use Illuminate\Http\Request;
use App\Exports\GeneralExport;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class SafeTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Safe $safe,Request $request)
    {
        //check permission
        $this->authorize("safe_transaction_view");

        if ($request->ajax()) {
            $data = $safe->transactions();
            return Datatables::of($data)->addIndexColumn()
            ->editColumn('created_at', function ($row) {
                return formatDate($row->created_at);
            })
            ->make(true);
        }

        return view('safe-transactions.index',compact("safe"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Safe $safe)
    {
        //check permission
        $this->authorize("safe_transaction_add");

        return view('safe-transactions.create',['users'=>User::select('id','name')->get(),'safe'=>$safe]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SafeTransactionRequest $request,Safe $safe)
    {
        //check permission
        $this->authorize("safe_transaction_add");

        try {

            $validated = $request->validated();

            if($request->type=='withdraw' &&  $safe->available_money < $request->amount){
                throw new \Exception(__("messages.safe.withdraw_failed_no_money"));
            }

            SafeTransaction::create([
                "transaction_by"=>$validated['transaction_by'],
                "action_by"=>auth()->id(),
                "type"=>$validated['type'],
                "amount"=>$validated['amount'],
                "note"=>$validated['note'],
                "date"=>$validated['date'],
                "safe_id"=>$safe->id,
            ]);

            if($request->type=='withdraw'){
                $safe->decrement('available_money',$request->amount);
                $safe->save();
                return redirect()->route('safe-transactions.index',$safe)->with([
                    "message" =>  __('messages.safe.withdraw_success'),
                    "icon" => "success",
                ]);
           }

            $safe->increment('available_money',$request->amount);
            $safe->save();
            return redirect()->route('safe-transactions.index',$safe)->with([
                "message" =>  __('messages.safe.deposit_success'),
                "icon" => "success",
            ]);

        } catch (\Exception $e) {
         
            return redirect()->route('safe-transactions.create',["safe"=>$safe->id])->with([
                "message" =>  $e->getMessage(),
                "icon" => "error",
            ]);
        }
    }

    public function export()
    {
        //check permission
        $this->authorize("safe_transaction_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "safe_transactions";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = SafeTransaction::all();

        // create file name  
        $fileName = "safe_transaction_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

        return Excel::download(new GeneralExport($query, $headers), $fileName);
    }

}