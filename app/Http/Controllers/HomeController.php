<?php

namespace App\Http\Controllers;

use App\Models\CarExpense;
use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (view()->exists('template.' . $request->path())) {
            return view('template.' . $request->path());
        }
        return abort(404);
    }

    public function root()
    {
        $totalOrder = Order::count();
        $totalCanceledOrder = Order::where('is_canceled', 1)->count();
        $totalInProgressOrder = Order::query()
            ->where('is_assigned', 1)
            ->orWhere('is_pickedup', 1)
            ->count();

        $totalDeliveredOrder = Order::where('is_delivered', 1)->count();

        // get last 5 orders
        $lastOrders = Order::query()
            ->select(['id', 'is_paid', 'status', 'created_at', 'total_price', 'client_id', 'order_by'])
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();

        // get most selled product buy num_of_sale field
        $mostSelledProduct = Product::query()
            ->with("supplier:id,name", 'category:id,name')
            ->orderBy('num_of_sales', 'desc')
            ->limit(10)
            ->get();

        $totalDriver = User::role('driver')->count();
        $totalAdmin = User::role('admin')->count();
        $totalWarehouseManger = User::role('warehouse-manger')->count();
        $totalSaleRepresentvie = User::role('sale-representative')->count();


        // CHARTS DATA CONFIG
        //group by order by status, and get count of each status
        $orderStatusChart = DB::table('orders')
            // ->whereMonth('created_at', date('m'))
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get()
            ->map(function ($item) {
                switch (trim($item->status)) {
                    case 'ordered':
                        $item->color = "#ebeff2";
                        break;
                    case 'accepted':
                        $item->color = "#34c38f";
                        break;
                    case 'canceled':
                        $item->color = "#f46a6a";
                        break;
                    case 'assigned':
                        $item->color = "#50a5f1";
                        break;
                    case 'pickedup':
                        $item->color = "#f1b44c";
                        break;
                    case 'delivered':
                        $item->color = "#556ee6";
                        break;
                }
                return (array) $item;
            })->toArray();

        // get due and paid orders
        $orderPaymentStatusChart = DB::table('orders')
            ->orderBy('is_paid', 'desc')
            ->select('is_paid', DB::raw('count(*) as total'))
            ->groupBy('is_paid')
            ->get()
            ->map(function ($item) {
                switch (trim($item->is_paid)) {
                    case 0:
                        $item->label = "Due";
                        $item->color = "#ebeff2";
                        break;
                    case 1:
                        $item->label = "Paid";
                        $item->color = "#556ee6";
                        break;
                }
                return (array) $item;
            })->toArray();



        // get all users in the system
        $syetemUserChart = [
            [
                "label" => "Driver",
                "color" => "#34c38f",
                "total" => $totalDriver
            ],
            [
                "label" => "Admin",
                "color" => "#f1b44c",
                "total" => $totalAdmin
            ],
            [
                "label" => "Sale Representvie",
                "color" => "#f46a6a",
                "total" => $totalSaleRepresentvie
            ],
            [
                "label" => "Client",
                "color" => "#556ee6",
                "total" => Client::count()
            ],
            [
                "label" => "Supplier",
                "color" => "#ebeff2",
                "total" => Supplier::count()
            ],
        ];

        // expense & car expense chart
        if (CarExpense::count() > 0) {
            $carExpenses = [
                'chart_title'           => __('translation.dashboard.monthly_car_expenses'),
                'chart_type'            => 'bar',
                'report_type'           => 'group_by_date',
                'model'                 => 'App\Models\CarExpense',
                'group_by_field'        => 'created_at',
                'group_by_period'       => 'month',
                'aggregate_function'    => 'sum',
                'aggregate_field'       => 'price',
                "chart_color"           => '85, 110, 230',
            ];
            $expenses = [
                'chart_title'           => __('translation.dashboard.monthly_expenses'),
                'chart_type'            => 'bar',
                'report_type'           => 'group_by_date',
                'model'                 => 'App\Models\Expense',
                'group_by_field'        => 'created_at',
                'group_by_period'       => 'month',
                'aggregate_function'    => 'sum',
                'aggregate_field'       => 'price',
                "chart_color"           => '52, 195, 143',
            ];
            $expenseChart = new LaravelChart($carExpenses, $expenses);
        } else {
            $expenseChart = NULL;
        }



        $data = [
            'totalOrder' => $totalOrder,
            'totalDriver' => $totalDriver,
            'totalSaleRepresentvie' => $totalSaleRepresentvie,
            'totalWarehouseManger' => $totalWarehouseManger,
            'totalAdmin' => $totalAdmin,
            'totalCanceledOrder' => $totalCanceledOrder,
            'totalInProgressOrder' => $totalInProgressOrder,
            'totalDeliveredOrder' => $totalDeliveredOrder,
            'lastOrders' => $lastOrders,
            'mostSelledProduct' => $mostSelledProduct,
            "orderStatusChart" => $orderStatusChart,
            "orderPaymentStatusChart" => $orderPaymentStatusChart,
            "expenseChart" => $expenseChart ?? NULL,
            "systemUserChart" => $syetemUserChart,
        ];
        return view('index', compact('data'));
    }

    public function storeTempFile(Request $request)
    {

        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function deleteTempFile(Request $request)
    {
        $path = storage_path('tmp/uploads');
        if (file_exists($path . '/' . $request->fileName)) {
            unlink($path . '/' . $request->fileName);
        }
    }

    /*Language Translation*/
    public function lang($locale)
    {
        if ($locale) {
            App::setLocale($locale);
            Session::put('lang', $locale);
            Session::save();
            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');

        if ($request->file('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $avatar->move($avatarPath, $avatarName);
            $user->avatar = '/images/' . $avatarName;
        }

        $user->update();
        if ($user) {
            Session::flash('message', 'User Details Updated successfully!');
            Session::flash('alert-class', 'alert-success');
            return response()->json([
                'isSuccess' => true,
                'Message' => "User Details Updated successfully!"
            ], 200); // Status code here
        } else {
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
            return response()->json([
                'isSuccess' => true,
                'Message' => "Something went wrong!"
            ], 200); // Status code here
        }
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return response()->json([
                'isSuccess' => false,
                'Message' => "Your Current password does not matches with the password you provided. Please try again."
            ], 200); // Status code
        } else {
            $user = User::find($id);
            $user->password = Hash::make($request->get('password'));
            $user->update();
            if ($user) {
                Session::flash('message', 'Password updated successfully!');
                Session::flash('alert-class', 'alert-success');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Password updated successfully!"
                ], 200); // Status code here
            } else {
                Session::flash('message', 'Something went wrong!');
                Session::flash('alert-class', 'alert-danger');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Something went wrong!"
                ], 200); // Status code here
            }
        }
    }
}
