<?php

namespace App\Http\Controllers;

use App\Models\Safe;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\GeneralExport;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use App\Http\Requests\SafeRequest;
use Log;

class SafeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //check permission
        $this->authorize("safe_view");

        if ($request->ajax()) {
            $data = Safe::query()
                ->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action', function ($row) {
                $td = '<td>';
                $td .= '<div class="d-flex">';
                     $td .= '<a href="' . route('safe-transactions.index', $row->id) . '" type="button" class="btn btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view_transactions') . '</a>';
                     $td .= '<a href="' . route('safe-transactions.create', $row->id) . '" type="button" class="btn btn-sm btn-info waves-effect waves-light me-1">' . __('buttons.make_transaction') . '</a>';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('safes.destroy', $row->id). '"  class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>';
                $td .= "</div>";
                $td .= "</td>";
                return $td;
            })
            ->editColumn('is_active', function ($row) {
                $td = '<td>';
                $td .= '<div class="d-flex">';
                $status = boolval($row->is_active) ? __('translation.active')  : __('translation.inactive');
                     $td .= '<button type="button" class="btn btn-sm btn-primary waves-effect waves-light me-1">'.$status.'</button>';
                $td .= "</div>";
                $td .= "</td>";
                return $td;
            })
            ->editColumn('created_at', function ($row) {
                return formatDate($row->created_at);
            })
            ->rawColumns(['action','is_active'])
            ->make(true);
        }

        return view('safes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //check permission
        $this->authorize("Safe_add");

        return view('safes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SafeRequest $request)
    {
        //check permission
        $this->authorize("Safe_add");

        
        try {
            $validated = $request->validated();
            Safe::create([
                "name"=>$validated['name'],
                "address"=>$validated['address'],
                "is_active"=>$validated['is_active'],
                "created_by"=>auth()->id(),
            ]);

            return redirect()->route('safes.index')->with([
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
     * @param  \App\Models\Safe  $Safe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Safe $safe)
    {
        //check permission
        $this->authorize("safe_delete");
        try {
            if(count($safe->transactions) > 0){
        
                // throw new \Exception("Some error message");
                return redirect()->route('safe-transactions.create',["safe"=>$safe->id])->with([
                    "message" =>  __("messages.safe.has_transactions"),
                    "icon" => "error",
                ]);
            }
        } catch (\Exception $e) {
            return redirect()->route('safes.index')->withErrors([
                "message" =>  __('messages.safe.has_transactions'),
                "icon" => "error",
            ])->setStatusCode(400);
        }
      
        $safe->delete();
        return redirect()->route('safes.index');
    }
}