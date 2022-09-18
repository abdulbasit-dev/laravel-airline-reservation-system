<?php

namespace App\Http\Controllers;

use App\Models\ExchangeHistory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ExchangeHistoryRequest;
use App\Exports\GeneralExport;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class ExchangeHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //check permission
        $this->authorize("exchange_history_view");

        if ($request->ajax()) {
            $data = ExchangeHistory::query()
                ->get();
            return Datatables::of($data)->addIndexColumn()
            ->editColumn('created_at', function ($row) {
                return formatDate($row->created_at);
            })
            ->make(true);
        }

        return view('exchange-history.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //check permission
        $this->authorize("exchange_history_add");

        return view('exchange-history.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExchangeHistoryRequest $request)
    {
        //check permission
        $this->authorize("exchange_history_add");

        try {
            $validated = $request->validated();
            ExchangeHistory::create([
                "usd"=>100,
                "iqd"=>$validated['iqd'],
                "action_by"=>auth()->id(),
            ]);

            return redirect()->route('exchange-history.index')->with([
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
}