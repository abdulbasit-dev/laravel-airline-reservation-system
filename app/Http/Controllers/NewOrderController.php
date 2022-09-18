<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Notifications\FcmNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;
use Illuminate\Support\Facades\Log;
use Throwable;

class NewOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //check permission
        $this->authorize("new_order_view");

        if ($request->ajax()) {
            //is accepted 
            //is not rejected
            //is not assigned
            //is not cancelled
            $data = Order::query()
                ->where('status', 'accepted')
                ->orWhere('status', 'cancelled')
                ->orWhere('status', 'assigned')
                ->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('orders.show', $row->id) . '" type="button" class="btn btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                    $td .= $row->is_assigned
                        ? '<button type="button" class="btn btn-sm btn-success waves-effect waves-light me-1" data-bs-toggle="modal" data-bs-target="#assignModal" data-driver="' .  $row->driver->name . '" data-bs-url="' . route("new-order.assign", $row->id) . '">' . __('translation.new_order.re_assign_driver') . '</button>'
                        : '<button type="button" class="btn btn-sm btn-info waves-effect waves-light me-1" data-bs-toggle="modal" data-bs-target="#assignModal" data-bs-url="' . route("new-order.assign", $row->id) . '">' . __('translation.new_order.assign_driver') . '</button>';
                    $td .= '<button type="button" class="btn btn-sm btn-danger waves-effect waves-light me-1" data-bs-toggle="modal" data-bs-target="#cancelModal" data-bs-url="' . route("new-order.cancel", $row->id) . '">' . __('buttons.cancel') . '</button>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->addColumn('client', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('clients.show', $row->client_id) . '">' . $row->client->name . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->addColumn('paid', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= ($row->is_paid) ? '<span class="badge badge-pill badge-soft-success font-size-14">' . __('translation.paid') . '</span>' : '<span class="badge badge-pill badge-soft-warning font-size-14">' . __('translation.due') . '</span>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('created_at', function ($row) {
                    return formatDate($row->created_at);
                })
                ->editColumn('total_price', function ($row) {
                    return formatPrice($row->total_price);
                })
                ->rawColumns(['action', 'client', 'paid'])
                ->make(true);
        }

        return view('warehouse.new-order', ["drivers" => User::role(['driver'])->get()->pluck("id", "name")]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function cancel(Order $order, Request $request)
    {
        //check permission
        $this->authorize("cancel_order");


        $validator = Validator::make($request->all(), [
            "cancel_note" => ['required', 'string'],
        ]);

        try {
            $validator->validate();

            $order->is_canceled = 1;
            $order->status = "canceled";
            $order->cancel_note = $request->cancel_note;
            $order->canceled_by = auth()->user()->id;
            $order->canceled_at = date("now");

            $order->save();
            if ($order->user->fcm_token != null) {
                try {
                    FcmNotification::send($order->user->fcm_token, __("messages.order.canceled"), __("messages.order.canceled"), ["order" => $order->id]);
                } catch (Throwable $th) {
                    logger($th);
                }
            }

            return redirect()->route('new-order.index')->with([
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function assign(Order $order, Request $request)
    {
        //check permission
        $this->authorize("assign_driver");

        $validator = Validator::make($request->all(), [
            "pickedup_by" => ['required', 'numeric'],
        ]);

        try {
            $validator->validate();

            $order->pickedup_by = $request->pickedup_by;
            $order->is_assigned = 1;
            $order->assigned_at = now();
            $order->status = "assigned";
            $order->assigned_by = auth()->user()->id;

            $order->save();
            if ($order->pickedup_by) {
                FcmNotification::send($order->driver->fcm_token, __("messages.order.assigned"), __("messages.order.assigned"), ["order" => $order->id]);
            }

            return redirect()->route('new-order.index')->with([
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
