<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\GeneralExport;
use App\Models\Product;
use App\Notifications\FcmNotification;
use App\Traits\UpdateProductStockTrait;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    use UpdateProductStockTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //check permission
        $this->authorize("order_view");

        if ($request->ajax()) {
            $data = Order::query()
                ->when($request->status, function ($query) use ($request) {
                    return $query->where('status', $request->status);
                });
            if (strtotime($request->startDate) && strtotime($request->endDate)) {
                $data->whereBetween('created_at', [$request->startDate, $request->endDate]);
            }
            if (is_numeric($request->order_by)) {
                $data->where('order_by', $request->order_by);
            }
            if (is_numeric($request->client)) {
                $data->where('client_id', $request->client);
            }
            if ($request->status) {
                $data->where('status', $request->status);
            }
            if ($request->payment_status) {
                $data->where('is_paid', $request->payment_status);
            }
            $data->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('orders.show', $row->id) . '" type="button" class="btn btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                    // $td .= '<a href="javascript:void(0)" data-id="' . $row->id . '" data-url="' . route('orders.destroy', $row->id) . '"  class="btn btn-sm btn-danger delete-btn">' . __('buttons.delete') . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('total_price', function ($row) {
                    return formatPrice($row->total_price);
                })
                ->editColumn('total_weight', function ($row) {
                    return formatPrice($row->total_price);
                })
                ->editColumn('profit', function ($row) {
                    return formatPrice($row->profit);
                })
                ->editColumn('created_at', function ($row) {
                    return formatDate($row->created_at);
                })
                ->editColumn('discount_amount', function ($row) {
                    return  $row->discount_amount ? formatPrice($row->discount_amount) : 'no discount';
                })
                ->editColumn('arrive_at', function ($row) {
                    return  formatDateWithTimezone($row->arrive_at);
                })
                ->editColumn('status', function ($row) {
                    return $row->status;
                    $td = '<td>';
                    $td .= '<span class="fw-bold text-' . orderClass($row->status) . ' text-capitalize">' . $row->status . '</span>';
                    $td .= "</td>";
                    return $td;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        return view('orders.index', ["sale_rep" => User::role(['sale-representative'])->get(), "orders" => Order::select("client_id")->groupBy('client_id')->get()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //check permission
        $this->authorize("order_view");

        $order->load('user:id,name,phone,phone_alt,email', 'orderDetails', 'orderDetails.product:id,name', 'payment');
        return view('orders.show', compact("order"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //check permission
        $this->authorize("order_delete");

        $order->delete();
        return redirect()->route('orders.index');
    }

    function getOrderStatus(Order $order)
    {
        return $order->status;
    }

    public function statusChange(Request $request, Order $order)
    {
        try {
            $userId = auth()->id();
            $order->status = $request->status;
            $order->status_by = $userId;
            //ACCEPT ORDER
            if ($request->status == 'accepted') {
                // if order is already accepted, then do nothing
                if (!$order->is_accepted) {
                    //check if order before is canceled, if yes, update the stoke
                    if ($order->is_canceled) {
                        // update stock of the product (increment)
                        $this->decrementProductStock($order->orderDetails()->get());

                        //reset cancel status, if before is canceled
                        $order->is_canceled = 0;
                        $order->canceled_by = null;
                        $order->canceled_at = null;
                    }

                    $order->is_accepted = 1;
                    $order->accepted_by = $userId;
                    $order->accepted_at = now();
                    $order->status == 'accepted';
                    $order->save();

                    FcmNotification::send($order->user->fcm_token, __("messages.order.accepted"), __("messages.order.accepted"), ["order" => $order->id]);
                    return 1;
                }
            } else {
                //CANCEL ORDER
                // if order already canceled, then do nothing
                if (!$order->is_canceled) {
                    // update stock of the product (increment)
                    $this->incrementProductStock($order->orderDetails()->get());

                    //reset accept status, if before is accepted
                    $order->is_accepted = 0;
                    $order->accepted_by = null;
                    $order->accepted_at = null;

                    $order->is_canceled = 1;
                    $order->canceled_by = $userId;
                    $order->canceled_at = now();
                    $order->status = 'canceled';
                    $order->save();

                    FcmNotification::send($order->user->fcm_token, __("messages.order.canceled"), __("messages.order.canceled"), ["order" => $order->id]);
                    return 1;
                }
            }
        } catch (\Exception $e) {
            return response()->json(['message' => fullErrorMessage($e)], 500);
        }
    }

    public function export()
    {
        //check permission
        $this->authorize("order_export");

        // get the heading of your file from the table or you can created your own heading
        $table = "orders";
        $headers = Schema::getColumnListing($table);

        // query to get the data from the table
        $query = Order::all();

        // create file name  
        $fileName = "order_export_" .  date('Y-m-d_h:i_a') . ".xlsx";

        return Excel::download(new GeneralExport($query, $headers), $fileName);
    }
}
