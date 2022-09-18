<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Safe;
use App\Models\SafeTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\GeneralExport;
use App\Models\PaymentHistory;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use DataTables;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //check permission
        $this->authorize("payment_view");

        if ($request->ajax()) {
            $data = Payment::query()
                ->with(["client"])
                ->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('order.link', function ($row) {

                $content =  '<a href="' . route('orders.show', $row->order_id) . '" type="button" class="btn btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view_order') . '</a>';
                return $this->prepareTd($content);

            })
            ->addColumn('client.link', function ($row) {
                $content =  '<a href="' . route('clients.show', $row->client_id) . '" type="button" class="btn btn-sm btn-info waves-effect waves-light me-1">' . $row->client->name . '</a>';
                return $this->prepareTd($content);
            })
            ->editColumn('is_paid', function ($row) {
                $content = ($row->is_paid) ? '<button type="button" class="btn btn-sm btn-success waves-effect waves-light me-1">' .__("buttons.is_paid"). '</button>' : '<button type="button" class="btn btn-sm btn-danger waves-effect waves-light me-1">' .__("buttons.not_paid"). '</button>';
                return $this->prepareTd($content);
            })
            ->editColumn('is_lost', function ($row) {
                $content = (!$row->is_lost) ? '<button type="button" class="btn btn-sm btn-success waves-effect waves-light me-1">' .__("buttons.not_lost"). '</button>' : '<button type="button" class="btn btn-sm btn-danger waves-effect waves-light me-1">' .__("buttons.lost"). '</button>';
                return $this->prepareTd($content);
            })
            ->editColumn('created_at', function ($row) {
                return formatDate($row->created_at);
            })
            ->rawColumns(['order.link','is_paid','is_lost'])
            ->make(true);
        }

        return view('payments.index');
    }

    public function history(Request $request)
    {
        //check permission
        $this->authorize("payment_view");

        if ($request->ajax()) {
            $data = PaymentHistory::query()
                ->where('is_money_returned',1)
                ->with(["client","user"])
                ->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action', function ($row) {
                    //  $content = '<a href="' . route('payments.show', $row->id) . '" type="button" class="btn btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                return $this->prepareTd('');
            })
            ->addColumn('client.link', function ($row) {
                $content =  '<a href="' . route('clients.show', $row->client_id) . '" type="button" class="btn btn-sm btn-info waves-effect waves-light me-1">' . $row->client->name . '</a>';
                return $this->prepareTd($content);
            })
            ->editColumn('is_money_returned', function ($row) {
                $content = ($row->is_money_returned) ? '<button type="button" class="btn btn-sm btn-success waves-effect waves-light me-1">' .__("buttons.returned"). '</button>' : '<button type="button" class="btn btn-sm btn-warning waves-effect waves-light me-1">' .__("buttons.not_returned"). '</button>';
                return $this->prepareTd($content);
            })
            ->editColumn('safe_id', function ($row) {
                $content = ($row->safe_id) ? '<button type="button" class="btn btn-sm btn-success waves-effect waves-light me-1">' .$row->safe->name. '</button></a>' : '<button type="button" class="btn btn-sm btn-warning waves-effect waves-light me-1">' .__("buttons.not_returned"). '</button>';
                return $this->prepareTd($content);
            })
            ->editColumn('money_accepted_by', function ($row) {
                $content = ($row->money_accepted_by) ? '<button type="button" class="btn btn-sm btn-success waves-effect waves-light me-1">' .$row->accountant->name. '</button></a>' : '<button type="button" class="btn btn-sm btn-warning waves-effect waves-light me-1">' .__("buttons.not_returned"). '</button>';
                return $this->prepareTd($content);
            })
            ->editColumn('created_at', function ($row) {
                return formatDate($row->created_at);
            })
            ->rawColumns(['action','client.link','is_money_returned','safe_id','money_accepted_by'])
            ->make(true);
        }

        return view('payments.history');
    }

    public function received(Request $request)
    {
        //check permission
        $this->authorize("payment_view");

        if ($request->ajax()) {
            $data = PaymentHistory::query()
                ->where('is_money_returned',0)
                ->with(["client","user"])
                ->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action', function ($row) {
                     $content = '<a href="' . route('payment-history.check', $row->id) . '" type="button" class="btn btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.transfer') . '</a>';
                return $this->prepareTd($content);
            })
            ->addColumn('client.link', function ($row) {
                $content =  '<a href="' . route('clients.show', $row->client_id) . '" type="button" class="btn btn-sm btn-info waves-effect waves-light me-1">' . $row->client->name . '</a>';
                return $this->prepareTd($content);
            })
            ->editColumn('created_at', function ($row) {
                return formatDate($row->created_at);
            })
            ->rawColumns(['action','client.link'])
            ->make(true);
        }

        return view('payments.received');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function check(PaymentHistory $payment_history)
    {
        //check permission
        $this->authorize("payment_check");

    if($payment_history->is_money_returned){
        return redirect()->back()->with([
            "message" =>  __("messages.payment.has_been_collected"),
            "icon" => "error",
        ]);
    }

        return view('payments.check',["payment_history"=>$payment_history,"safe"=>Safe::isActive()]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function collect(PaymentHistory $payment_history, Request $request)
    {
        //check permission
        $this->authorize("payment_check");

        if($payment_history->is_money_returned){
                return redirect()->back()->with([
                    "message" =>  __("messages.payment.has_been_collected"),
                    "icon" => "error",
                ]);
        }

        //validation
        $validator = Validator::make($request->all(), [
            "safe_id" => ['required','exists:safes,id'],
        ]);
        
        
        try {
            $validator->validate();
            $payment_history->is_money_returned=1;
            $payment_history->money_accepted_by=auth()->id();
            $payment_history->safe_id=$request->safe_id;
            $payment_history->save();

            // $payment = $payment_history->payment; 
            // $payment->increment('paid',$payment_history->amount_paid);
            // $payment->decrement('paid',$request->amount_paid);
            // $payment->is_paid = $payment->due == 0;
            // $payment->save();

            SafeTransaction::create([
                "transaction_by"=>auth()->id(),
                "action_by"=>auth()->id(),
                "type"=>"deposit",
                "amount"=>$payment_history->amount_paid,
                "note"=>"
                TODO                
                ",
                "date"=>now(),
                "safe_id"=>$request->safe_id,
            ]);

            safe::find($request->safe_id)->increment('available_money',$payment_history->amount_paid);

            return to_route('payment-history.received')->with([
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentRequest $request)
    {
        //check permission
        $this->authorize("payment_add");

        try {
            $validated = $request->validated();
            Payment::create($validated);

            return redirect()->route('payments.index')->with([
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
        $this->authorize("payment_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "payments";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = Payment::all();

        // create file name  
        $fileName = "payment_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

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