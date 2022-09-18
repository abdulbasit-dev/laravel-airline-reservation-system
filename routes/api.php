<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\Auth\AuthController;


use App\Http\Controllers\Api\V1\{
    BrandController,
    CarExpenseController,
    ProductController,
    CartController,
    CategoryController,
    OrderController,
    ProfileController,
    SupplierController,
    WorkTimeController,
    ClientController,
    ClientCategoryController,
    ContactController,
    TrackingController,
    CouponController,
    NewOrderController,
    ReportController,
    ReturnProductController,
    SettingController,
    VisitController,
    VisitDescriptionController,
    FcmController,
    StandController,
};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//API V1 
Route::group(['prefix' => 'v1'], function () {

    /*=================
       PUBLIC ROUTES
    =================*/

    Route::post('/login', [AuthController::class, 'login']);

    //Clear all cache
    Route::get('/clearallcache', function () {
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('config:cache');
        Artisan::call('route:clear');
        Artisan::call('clear-compiled');

        return "ok";
    });

    //Clear all cache
    Route::get('/reset-database', function () {
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');
        return "ok";
    });

    /*=================
      PROTECTED ROUTES
    ===================*/
    Route::group(['middleware' => ['auth:sanctum']], function () {

        // Auth
        Route::post('/logout', [AuthController::class, 'logout']);
        
        //FCM
        Route::post('/user/fcm', [FcmController::class, 'update']);

        // Auth
        Route::get('/profile', [ProfileController::class, 'showProfile']);
        Route::match(['put', 'patch'], '/profile/update', [ProfileController::class, 'update']);

        // brand
        Route::get('brands', BrandController::class);

        // category
        Route::get('categories', CategoryController::class);

        // suppliers
        Route::get('suppliers', SupplierController::class);

        // clients & client categories 
        Route::get('client-categories', ClientCategoryController::class);
        Route::get('clients/{client}/payments', [ClientController::class, 'paymentHistory'])->name("client.payments");
        Route::get('clients/{client}/dues', [ClientController::class, 'dues'])->name("client.dues");
        Route::post('clients/search', [ClientController::class, 'search'])->name("client.search");
        Route::apiResource('clients', ClientController::class)->except('destroy');

        // products
        Route::apiResource('products', ProductController::class)->only('index', 'show');

        // carts
        Route::post('carts', [CartController::class, 'add']);
        Route::delete('carts/{cart}', [CartController::class, 'destroy']);
        Route::post('carts/client-select', [CartController::class, 'clientSelect']);
        Route::get('carts/summary/{user_id}', [CartController::class, 'summary']);

        // coupons
        Route::get('coupons', [CouponController::class, 'index']);
        Route::post('coupons/apply', [CouponController::class, 'applyCoupon']);
        Route::post('coupons/remove', [CouponController::class, 'removeCoupon']);

        // orders 
        Route::post('orders/{order}/pay', [OrderController::class, 'pay'])->name('orders.pay');
        Route::post('orders/{order}/delivered', [OrderController::class, 'delivered'])->name('orders.delivered');
        Route::post('orders/{order}/pickedup', [OrderController::class, 'pickedup'])->name('orders.pickedup');
        Route::post('orders/search', [OrderController::class, 'search'])->name('orders.search');
        Route::get('orders/order-list', [OrderController::class, 'orderList']);
        Route::apiResource('orders', OrderController::class)->except('update', 'destroy');

        // Payment 
        // Route::apiResource('payments', PaymentController::class)->except('update', 'destroy');

        //driver order
        Route::get('/driver-orders', [NewOrderController::class, 'index'])->name("driver-orders");

        // worktimes
        Route::get('work-time/user-work', [WorkTimeController::class, 'userWork']);
        Route::get('work-time/work-status', [WorkTimeController::class, 'workStatus']);
        Route::post('work-time/start-work', [WorkTimeController::class, 'startWork']);
        Route::post('work-time/end-work', [WorkTimeController::class, 'endWork']);

        //car expenses
        Route::apiResource('car-expenses', CarExpenseController::class)->only('index', 'store');

        // contacts 
        Route::post('contacts', [ContactController::class, 'store']);

        // contacts 
        Route::get('settings/key', [SettingController::class, 'key']);
        Route::get('settings/value', [SettingController::class, 'getValue']);

        //Tracking
        Route::post('TrackingUpdate', [TrackingController::class, 'update']);

        //Stand
        Route::get("stands", [StandController::class, "index"]);
        Route::get("stands/my", [StandController::class, "getAllByUser"]);
        Route::post("stands", [StandController::class, "store"]);
        Route::get("stands/{stand}", [StandController::class, "show"]);

        //Visit
        Route::get("visits", [VisitController::class, "index"]);
        Route::get("visits/my", [VisitController::class, "getAllByUser"]);
        Route::post("visits", [VisitController::class, "store"]);
        Route::get("visits/{visit}", [VisitController::class, "show"]);

        //Visit description
        Route::get("visit-description", [VisitDescriptionController::class, "index"]);

        // reports
        Route::get('reports/summary', [ReportController::class, 'summary']);
        Route::get('reports/today-order', [ReportController::class, 'todayOrder']);
        Route::get('reports/client-visits', [ReportController::class, 'clientVisits']);
        Route::get('reports/return-products', [ReportController::class, 'returnProducts']);

        // return products
        Route::get('return-products', [ReturnProductController::class, 'returnProducts']);
        Route::post('return-products', [ReturnProductController::class, 'addReturnProducts']);
        Route::post('return-products/return-money', [ReturnProductController::class, 'returnMoney']);
    });

    //handle invalid routes
    Route::fallback(function () {
        return [
            'result' => false,
            'status' => 404,
            'message' => "invalid route",
        ];
    });
});
