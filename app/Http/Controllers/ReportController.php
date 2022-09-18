<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarExpense;
use App\Models\Category;
use App\Models\Client;
use App\Models\ClientCategory;
use App\Models\Expense;
use App\Models\Order;
use App\Models\Product;
use App\Models\ReturnProduct;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Log;

class ReportController extends Controller
{
    public function order(Request $request)
    {
        //check permission
        $this->authorize("orderReport_view");

        if ($request->ajax()) {
            $data = Order::query()
                ->with('client:id,name', 'user:id,name');
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
                    $td .= '<a href="' . route('orders.show', $row->id) . '" type="button" class="btn btn-rounded btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('total_price', function ($row) {
                    return formatPrice($row->total_price);
                })
                ->editColumn('discount_amount', function ($row) {
                    return  $row->discount_amount ? formatPrice($row->discount_amount) : 'no discount';
                })
                ->editColumn('arrive_at', function ($row) {
                    return  formatDateWithTimezone($row->arrive_at);
                })
                ->editColumn('status', function ($row) {
                    $td = '<td>';
                    $td .= '<span class="fw-bold text-' . orderClass($row->status) . ' text-capitalize">' . $row->status . '</span>';
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('created_at', function ($row) {
                    return formatDate($row->created_at);
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        $saleReps = User::role(['sale-representative'])->get();
        $orders = Order::select("client_id")->groupBy('client_id')->get();
        $statuses = ["ordered", "canceled", "accepted", "assigned", "pickedup", "delivered"];

        return view('reports.order-report', compact('saleReps', 'orders', 'statuses'));
    }

    public function product(Request $request)
    {
        //check permission
        $this->authorize("productReport_view");

        if ($request->ajax()) {
            $data = Product::query()
                ->when($request->category, function ($query) use ($request) {
                    return $query->where('category_id', $request->category);
                })
                ->when($request->supplier, function ($query) use ($request) {
                    return $query->where('supplier_id', $request->supplier);
                })
                ->when($request->haBox, function ($query) use ($request) {
                    return $query->where('is_box',  0);
                })
                ->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('products.show', $row->id) . '" type="button" class="btn btn-rounded btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->addColumn('image', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex align-items-center">';
                    $td .= '<img src="' . getFile($row) . '" class="img-thumbnail avatar-md">';
                    $td .= '<span class="ms-2">' . $row->name . '</span>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('created_at', function ($row) {
                    return formatDateWithTimezone($row->created_at);
                })
                ->editColumn('is_box', function ($row) {
                    return $row->is_box ? '<span class="badge badge-pill badge-soft-success font-size-11">' . __('translation.yes') . '</span>' : '<span class="badge badge-pill badge-soft-danger font-size-11">' . __('translation.no') . '</span>';
                })
                ->editColumn('box_quantity', function ($row) {
                    return $row->is_box ? $row->box_quantity : '---';
                })
                ->rawColumns(['action', 'image', 'is_box'])
                ->make(true);
        }

        $suppliers = Supplier::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');
        $hasBox = collect([
            ['id' => 1, 'name' => 'Yes'],
            ['id' => 0, 'name' => 'No'],
        ])->pluck('name', 'id');

        return view('reports.product-report', compact('suppliers', 'categories', 'hasBox'));
    }

    public function client(Request $request)
    {
        //check permission
        $this->authorize("clientReport_view");

        if ($request->ajax()) {
            $data = Client::query()
                ->withCount('orders')
                ->with('category:id,name')
                ->when($request->category, function ($query) use ($request) {
                    return $query->where('category_id', $request->category);
                })
                ->when($request->loanLimit, function ($query) use ($request) {
                    return $query->where('loan_limit', $request->loanLimit);
                })
                ->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('clients.show', $row->id) . '" type="button" class="btn btn-rounded btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('orders_count', function ($row) {
                    return $row->orders_count
                        ? '<span class="badge badge-pill badge-soft-success font-size-14">' . $row->orders_count . '</span>'
                        : '<span class="badge badge-pill badge-soft-danger font-size-14">' . $row->orders_count . '</span>';
                })
                ->rawColumns(['action', 'orders_count'])
                ->make(true);
        }

        $categories = ClientCategory::pluck('name', 'id');

        $loanLimit = Client::query()
            ->select('loan_limit')
            ->groupBy('loan_limit')
            ->get()
            ->pluck('loan_limit');

        return view('reports.client-report', compact('categories', 'loanLimit'));
    }

    public function car(Request $request)
    {
        //check permission
        $this->authorize("carReport_view");

        if ($request->ajax()) {
            $data = Car::query()
                ->with('driver:id,name')
                ->withSum('expenses', "price")
                ->withCount('expenses')
                ->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('cars.show', $row->id) . '" type="button" class="btn btn-sm btn-rounded btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('expenses_sum_price', fn ($row) => $row->expenses_sum_price ? formatPrice($row->expenses_sum_price) : 'no expenses')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('reports.car-report');
    }

    public function carExpense(Request $request)
    {
        //check permission
        $this->authorize("carExpenseReport_view");

        if ($request->ajax()) {
            $data = CarExpense::query()
                ->with('car', 'user:id,name')
                ->when($request->model, function ($query) use ($request) {
                    return $query->whereHas('car', function ($query) use ($request) {
                        $query->where('model', $request->model);
                    });
                })
                ->when($request->user, function ($query) use ($request) {
                    return $query->whereHas('user', function ($query) use ($request) {
                        $query->where('id', $request->user);
                    });
                })
                ->when($request->startDate && $request->endDate, function ($query) use ($request) {
                    $query->whereBetween('created_at', [$request->startDate, $request->endDate]);
                })
                ->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('car-expenses.show', $row->id) . '" type="button" class="btn btn-rounded btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('created_at', fn ($row) => formatDate($row->created_at))
                ->rawColumns(['action'])
                ->make(true);
        }

        $cars = Car::pluck('model', 'id');
        $users = User::role(['sale-representative', "driver"])->pluck('name', 'id');

        return view('reports.car-expense-report', compact('cars', 'users'));
    }

    public function visit(Request $request)
    {
        //check permission
        $this->authorize("visitReport_view");

        if ($request->ajax()) {
            $data = Visit::query()
                ->with('user:id,name', 'client:id,name')
                ->when($request->startDate && $request->endDate, function ($query) use ($request) {
                    $query->whereBetween('created_at', [$request->startDate, $request->endDate]);
                })
                ->when($request->user, function ($query) use ($request) {
                    $query->where('user_id', $request->user);
                })
                ->when($request->client, function ($query) use ($request) {
                    $query->where('client_id', $request->client);
                })
                ->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('visits.show', $row->id) . '" type="button" class="btn btn-rounded btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
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

        $users = Visit::select('user_id')->get()->unique('user_id')->pluck('user.name', 'user_id');
        $clients = Visit::select('client_id')->get()->unique('client_id')->pluck('client.name', 'client_id');

        return view('reports.visit-report', compact('users', 'clients'));
    }

    public function expense(Request $request)
    {
        //check permission
        $this->authorize("expenseReport_view");

        if ($request->ajax()) {
            $data = Expense::query()
                ->with('user:id,name', 'tag:id,name', 'safe:id,name')
                ->when($request->startDate && $request->endDate, function ($query) use ($request) {
                    $query->whereBetween('created_at', [$request->startDate, $request->endDate]);
                })
                ->when($request->user, function ($query) use ($request) {
                    $query->where('user_id', $request->user);
                })
                ->when($request->tag, function ($query) use ($request) {
                    $query->where('tag_id', $request->tag);
                })
                ->when($request->safe, function ($query) use ($request) {
                    $query->where('safe_id', $request->safe);
                })
                ->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('expenses.show', $row->id) . '" type="button" class="btn btn-rounded btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.view') . '</a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('safe_id', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<button type="button" class="btn btn-sm btn-success waves-effect waves-light me-1">' . $row->safe->name . '</button></a>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->editColumn('created_at', fn ($row) => formatDate($row->created_at))
                ->editColumn('price', fn ($row) => formatPrice($row->price))
                ->rawColumns(['action', 'safe_id'])
                ->make(true);
        }

        $users = Expense::select('user_id')->get()->unique('user_id')->pluck('user.name', 'user_id');
        $tags = Expense::select('tag_id')->get()->unique('tag_id')->pluck('tag.name', 'tag_id');
        $safes = Expense::select('safe_id')->get()->unique('safe_id')->pluck('safe.name', 'safe_id');

        return view('reports.expense-report', compact('users', 'tags', 'safes'));
    }

    public function returnProduct(Request $request)
    {
        //check permission
        $this->authorize("returnProductReport_view");

        if ($request->ajax()) {
            $data = ReturnProduct::query()
                ->with('client:id,name', 'product:id,name', 'user:id,name')
                ->when($request->startDate && $request->endDate, function ($query) use ($request) {
                    $query->whereBetween('created_at', [$request->startDate, $request->endDate]);
                })
                ->when($request->user, function ($query) use ($request) {
                    $query->where('user_id', $request->user);
                })
                ->when($request->tag, function ($query) use ($request) {
                    $query->where('tag_id', $request->tag);
                })
                ->when($request->safe, function ($query) use ($request) {
                    $query->where('safe_id', $request->safe);
                })
                ->get();
            return Datatables::of($data)->addIndexColumn()
                ->editColumn('return_date', function ($row) {
                    return formatDate($row->return_date);
                })
                ->editColumn('return_price', function ($row) {
                    return formatPrice($row->return_price);
                })
                ->editColumn('estimate_price', function ($row) {
                    return formatPrice($row->estimate_price);
                })
                ->editColumn('type', function ($row) {
                    return $row->type ? __('translation.pc') : __('translation.box');
                })
                ->addColumn('image', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex align-items-cente">';
                    $td .= '<img src="' . getFile($row->product) . '" class="img-thumbnail" style="width:70px;height:70px;">';
                    $td .= '<span class="ms-2">' . $row->product->name . '</span>';
                    $td .= "</div>";
                    $td .= "</td>";
                    return $td;
                })
                ->rawColumns(['image'])
                ->make(true);
        }

        $users = ReturnProduct::select('user_id')->get()->unique('user_id')->pluck('user.name', 'user_id');
        $clients = ReturnProduct::select('client_id')->get()->unique('client_id')->pluck('client.name', 'client_id');

        return view('reports.return-product-report', compact('users', 'clients'));
    }

    public function supplier(Request $request)
    {
        //check permission
        $this->authorize("supplierReport_view");

        if ($request->ajax()) {
            $data = Supplier::query()
                ->orderByDesc('created_at')
                ->withCount('products')
                ->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $td = '<td>';
                    $td .= '<div class="d-flex">';
                    $td .= '<a href="' . route('suppliers.edit', $row->id) . '" type="button" class="btn btn-rounded btn-sm btn-primary waves-effect waves-light me-1">' . __('buttons.edit') . '</a>';
                    $td .= '</div>';
                    $td .= '</td>';
                    return $td;
                })
                ->editColumn('products_count', fn ($row) => "<span class='badge badge-pill badge-soft-primary font-size-14'>{$row->products_count}</span>")
                ->rawColumns(['action', 'products_count'])
                ->make(true);
        }

        return view('reports.supplier-report');
    }
}
