<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\GeneralExport;
use App\Http\Requests\CouponRequest;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //check permission
        $this->authorize("coupon_view");

        if ($request->ajax()) {
            $data = Coupon::query()
                ->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('coupons.destroy', $row->id) . '"  class="btn btn-sm btn-rounded btn-danger delete-btn">' . __('buttons.delete') . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('coupons.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //check permission
        $this->authorize("coupon_add");

        $discountTypes = [
            'percentage' => 'Percentage',
            'amount' => 'Amount',
        ];

        // $types = [
        //     'product_base' => 'Product Base',
        //     'cart_base' => 'Cart Base',
        // ];

        return view('coupons.create', compact('discountTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request)
    {
        //check permission
        $this->authorize("coupon_add");

        try {
            $validated = $request->validated();
            Coupon::create($validated, ['created_by' => auth()->id()]);

            return redirect()->route('coupons.index')->with([
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
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        //check permission
        $this->authorize("coupon_delete");

        $coupon->delete();
        return redirect()->route('coupons.index');
    }

    public function export()
    {
        //check permission
        $this->authorize("coupon_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "coupons";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = Coupon::all();

        // create file name  
        $fileName = "coupon_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

        return Excel::download(new GeneralExport($query, $headers), $fileName);
    }
}
