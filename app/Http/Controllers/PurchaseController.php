<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Safe;
use App\Models\Product;
use App\Models\SafeTransaction;
use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseRequest;
use App\Http\Requests\PurchaseDetailRequest;
use Illuminate\Http\Request;
use App\Exports\GeneralExport;
use App\Models\PurchaseHistory;
use App\Models\ExchangeHistory;
use App\Models\Supplier;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use DataTables;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //check permission
        $this->authorize("purchase_view");
        
        if ($request->ajax()) {
            $data = Purchase::query();

                if(strtotime($request->startDate) && strtotime($request->endDate)){
                    $data->whereBetween('created_at',[$request->startDate,$request->endDate]);
                }
                $data->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action', function ($row) {
                $content = '<a href="' . route('purchases.create', $row->id) . '" type="button" class="btn btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.transfer') . '</a>';
           return $this->prepareTd($content);
            })
            ->addColumn('user', function ($row) {
                $content =  '<button type="button" class="btn btn-sm btn-primary waves-effect waves-light me-1">' .$row->user->name . '</a>';
                return $this->prepareTd($content);
            })
            ->editColumn('supplier', function ($row) {
                $content =  '<button type="button" class="btn btn-sm btn-info waves-effect waves-light me-1">' . $row->supplier->name . '</button>';
                return $this->prepareTd($content);
            })
            ->editColumn('is_paid', function ($row) {
                $content = ($row->is_paid) ? '<button type="button" class="btn btn-sm btn-success waves-effect waves-light me-1">' .__("buttons.is_paid"). '</button>' : '<button type="button" class="btn btn-sm btn-danger waves-effect waves-light me-1">' .__("buttons.not_paid"). '</button>';
                return $this->prepareTd($content);
            })
            ->editColumn('created_at', function ($row) {
                return formatDate($row->created_at);
            })
            ->rawColumns(['action','user','is_paid','supplier'])
            ->make(true);
        }

        return view('purchases.index');
    }

    public function history(Request $request)
    {
        //check permission
        $this->authorize("purchase_view");

        if ($request->ajax()) {
            $data = PurchaseHistory::query()
                ->whereNotNull('safe_id')
                ->with(["supplier","user"]);
                if(strtotime($request->startDate) && strtotime($request->endDate)){
                    $data->whereBetween('created_at',[$request->startDate,$request->endDate]);
                }
                $data->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('supplier', function ($row) {
                $content =  '<button type="button" class="btn btn-sm btn-info waves-effect waves-light me-1">' . $row->supplier->name . '</button>';
                return $this->prepareTd($content);
            })
            ->editColumn('safe_id', function ($row) {
                $content = ($row->safe_id) ? '<button type="button" class="btn btn-sm btn-success waves-effect waves-light me-1">' .$row->safe->name. '</button></a>' : '<button type="button" class="btn btn-sm btn-warning waves-effect waves-light me-1">' .__("buttons.not_paid"). '</button>';
                return $this->prepareTd($content);
            })
            ->editColumn('created_at', function ($row) {
                return formatDate($row->created_at);
            })
            ->rawColumns(['action','supplier','is_money_returned','safe_id','money_accepted_by'])
            ->make(true);
        }

        return view('purchases.history');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function check(Purchase $purchase)
    {
        //check permission
        $this->authorize("purchase_create");

        return view('purchases.check',["suppliers"=>Supplier::select('id','name')->get(),"safe"=>Safe::isActive()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(PurchaseDetailRequest $request)
    {
        //check permission
        $this->authorize("purchase_add");

        try {
            $validated = $request->validated();
            $purchase = Purchase::create([
                "user_id" => auth()->id(),
                "supplier_id" => $request->supplier_id,
                "note"=>$request->note,
                "due" => $request->total,
                "paid"=>0,
            ]);

            if($request->amount_paid){
                $purchase->history()->create([
                    "amount_paid"=>$request->amount_paid,
                    "user_id"=>auth()->id(),
                    "supplier_id"=>$purchase->supplier_id,
                    "date"=>$request->date,
                    "safe_id"=>$request->safe_id,
                    "exchange_type"=>$request->exchange_type,
                    "usd_rate"=>ExchangeHistory::latest()->first()->iqd,
                ]);

                $purchase->increment("paid",$request->amount_paid);
                $purchase->decrement("due",$request->amount_paid);
                $purchase->is_paid = $purchase->due == 0;
                $purchase->save();

                SafeTransaction::create([
                    "transaction_by"=>auth()->id(),
                    "action_by"=>auth()->id(),
                    "type"=>"withdraw",
                    "amount"=>$request->amount_paid,
                    "note"=>"
                    TODO                
                    ",
                    "date"=>now(),
                    "safe_id"=>$request->safe_id,
                ]);
    
                $safe = Safe::find($request->safe_id);
                $safe->decrement("available_money",$request->amount_paid);
            }

            foreach($request->id as $key =>$value){
                $purchase->details()->create([
                    "product_id"=>$key,
                    "product_price"=>$request->price[$key],
                    "quantity"=>$request->quantity[$key],
                    "total_price"=>$request->totalarray[$key],
                ]);
                Product::find($key)->increment('quantity',$request->quantity[$key]);
            }

            return redirect()->route('purchases.index')->with([
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Purchase $purchase)
    {
        //check permission
        $this->authorize("purchase_create");

    // if($purchase->is_paid){
    //     return redirect()->back()->with([
    //         "message" =>  __("messages.purchase.has_been_paid"),
    //         "icon" => "error",
    //     ]);
    // }

        return view('purchases.create',["purchase"=>$purchase,"safe"=>Safe::isActive()]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Purchase $purchase,PurchaseRequest $request)
    {
        //check permission
        $this->authorize("purchase_add");

        try {
            $validated = $request->validated();
            $purchase->history()->create([
                "amount_paid"=>$request->amount_paid,
                "user_id"=>auth()->id(),
                "supplier_id"=>$purchase->supplier_id,
                "date"=>$request->date,
                "safe_id"=>$request->safe_id,
                "exchange_type"=>$request->exchange_type,
                "usd_rate"=>ExchangeHistory::latest()->first()->iqd,
            ]);

            $purchase->increment("paid",$request->amount_paid);
            $purchase->decrement("due",$request->amount_paid);
            $purchase->is_paid = $purchase->due == 0;
            $purchase->save();

            SafeTransaction::create([
                "transaction_by"=>auth()->id(),
                "action_by"=>auth()->id(),
                "type"=>"withdraw",
                "amount"=>$request->amount_paid,
                "note"=>"
                TODO                
                ",
                "date"=>now(),
                "safe_id"=>$request->safe_id,
            ]);

            $safe = Safe::find($request->safe_id);
            $safe->decrement("available_money",$request->amount_paid);
            

            return redirect()->route('purchases.index')->with([
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

    public function export()
    {
        //check permission
        $this->authorize("purchase_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "purchases";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = Purchase::all();

        // create file name  
        $fileName = "purchase_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

        return Excel::download(new GeneralExport($query, $headers), $fileName);
    }

    private function prepareTd($content){
        $td = '<td>';
        $td .= '<div class="d-flex">';
        $td .= $content;
        $td .= "</div>";
        $td .= "</td>";
        return $td;
    }
}