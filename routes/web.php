<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    HomeController,
    SupplierController,
    CategoryController,
    CarController,
    CarExpenseController,
    ClientCategoryController,
    ClientController,
    ContactController,
    CouponController,
    LaravelExcelExport,
    RoleController,
    UserController,
    TrackingController,
    VisitController,
    WorkTimeController,
    VisitDescriptionController,
    OrderController,
    ExpenseTagController,
    ExpenseController,
    NewOrderController,
    SettingController,
    ProductController,
    ExchangeHistoryController,
    SafeController,
    SafeTransactionController,
    ReturnProductController,
    PaymentController,
    PurchaseController,
    ReportController,
    StandController,
    ZoneController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'root'])->name('root');

    //Update User Details
    Route::post('/update-profile/{id}', [HomeController::class, 'updateProfile'])->name('updateProfile');
    Route::post('/update-password/{id}', [HomeController::class, 'updatePassword'])->name('updatePassword');

    Route::post('/store-temp-file', [HomeController::class, 'storeTempFile'])->name('storeTempFile');
    Route::post('/delete-temp-file', [HomeController::class, 'deleteTempFile'])->name('deleteTempFile');

    //export template for modeles by passing file type and table name
    Route::get('export-template/{type}/{table}', LaravelExcelExport::class)->name('exportTemplate');

    //suppliers
    Route::get('suppliers/export', [SupplierController::class, 'export'])->name('suppliers.export');
    Route::post('suppliers/import', [SupplierController::class, 'import'])->name('suppliers.import');
    Route::resource("suppliers", SupplierController::class)->except(['show']);

    //categories
    Route::get('categories/export', [CategoryController::class, 'export'])->name('categories.export');
    Route::post('categories/import', [CategoryController::class, 'import'])->name('categories.import');
    Route::resource("categories", CategoryController::class)->except(['show']);

    //products
    Route::post("products/supplier", [ProductController::class, 'bySupplier'])->name('products.by-supplier');
    Route::resource("products", ProductController::class);

    // orders
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{order}/get-status', [OrderController::class, 'getOrderStatus'])->name('orders.getStatus');
    Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('orders/{order}/status-change', [OrderController::class, 'statusChange'])->name('orders.statusChange');
    Route::delete('orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');

    //clients
    Route::get('clients/export', [ClientController::class, 'export'])->name('clients.export');
    Route::post('clients/import', [ClientController::class, 'import'])->name('clients.import');
    Route::get('clients/map-view', [ClientController::class, 'mapView'])->name('clients.mapView');
    Route::resource("clients", ClientController::class);

    //zones
    Route::get('zones/export', [ZoneController::class, 'export'])->name('zones.export');
    Route::post('zoness/import', [ZoneController::class, 'import'])->name('zones.import');
    Route::resource("zones", ZoneController::class)->except('show');

    //Map
    Route::get('/tracking/live', [TrackingController::class, 'live'])->name('tracking.live');
    Route::get('/tracking/history', [TrackingController::class, 'history'])->name('tracking.history');
    Route::post('/tracking/filter', [TrackingController::class, 'filter'])->name('tracking.filter');

    //Visit
    Route::get('visits/export', [VisitController::class, 'export'])->name('visits.export');
    Route::resource("visits", VisitController::class)->only(['index', 'show', 'destroy']);

    //VisitDescription
    Route::resource("visit-description", VisitDescriptionController::class)->only(['index', 'store', 'destroy']);
    Route::get("visit-description/export", [VisitDescriptionController::class, 'export'])->name('visit-description.export');

    //Stand
    Route::get('stands/export', [StandController::class, 'export'])->name('stands.export');
    Route::resource("stands", StandController::class)->only(['index', 'show', 'destroy']);

    //Expense Tags
    Route::resource("expense-tags", ExpenseTagController::class)->except(['edit', 'show']);

    //Expense
    Route::get("expenses/export", [ExpenseController::class, 'export'])->name('expenses.export');
    Route::resource("expenses", ExpenseController::class)->except('edit', 'update');

    //warehouse
    Route::resource("warehouse/new-order", NewOrderController::class)->only(['index']);
    Route::POST("new-order/cancel/{order}", [NewOrderController::class, 'cancel'])->name("new-order.cancel");
    Route::POST("new-order/assign/{order}", [NewOrderController::class, 'assign'])->name("new-order.assign");

    // client categories
    Route::get('client-categories/export', [ClientCategoryController::class, 'export'])->name('client-categories.export');
    Route::post('client-categories/import', [ClientCategoryController::class, 'import'])->name('client-categories.import');
    Route::resource("client-categories", ClientCategoryController::class)->except(['show']);

    // client categories
    Route::get('contacts/export', [ContactController::class, 'export'])->name('contacts.export');
    Route::resource("contacts", ContactController::class)->only(['index', 'show']);

    //users
    Route::get('users/export', [UserController::class, 'export'])->name('users.export');
    Route::resource("users", UserController::class);

    //roles
    Route::get('roles/export', [RoleController::class, 'export'])->name('roles.export');
    Route::post('roles/import', [RoleController::class, 'import'])->name('roles.import');
    Route::resource("roles", RoleController::class);

    //coupons
    Route::get('coupons/export', [CouponController::class, 'export'])->name('coupons.export');
    Route::resource("coupons", CouponController::class)->except('show');

    //coupons
    Route::get("work-times", [WorkTimeController::class, 'index'])->name('work-times.index');
    Route::get("work-times/user-report/{user}", [WorkTimeController::class, 'userWorktimes'])->name('work-times.user-report');

    //cars
    Route::get('cars/export', [CarController::class, 'export'])->name('cars.export');
    Route::resource("cars", CarController::class);

    //return products
    Route::resource("return-products", ReturnProductController::class);

    //car expenses
    Route::get('car-expenses/export', [CarExpenseController::class, 'export'])->name('car-expenses.export');
    Route::resource("car-expenses", CarExpenseController::class)->only(['index', 'show', 'destroy']);

    //Safe
    Route::get('exchange-history/export', [ExchangeHistoryController::class, 'export'])->name('exchange-history.export');
    Route::resource("safes", SafeController::class);

    //Payments
    Route::get('payments/export', [PaymentController::class, 'export'])->name('payments.export');
    Route::get("payments", [PaymentController::class, 'index'])->name("payments.index");
    Route::get("payment-history", [PaymentController::class, 'history'])->name("payment-history.index");
    Route::get("payment-new", [PaymentController::class, 'received'])->name("payment-history.received");
    Route::get("payment/{payment_history}/check", [PaymentController::class, 'check'])->name("payment-history.check");
    Route::post("payment/{payment_history}/collect", [PaymentController::class, 'collect'])->name("payment-history.collect");

    //purchases
    Route::get('purchases/export', [PurchaseController::class, 'export'])->name('purchases.export');
    Route::get("purchases", [PurchaseController::class, 'index'])->name("purchases.index");
    Route::get("purchases/check", [PurchaseController::class, "check"])->name("purchases.check");
    Route::post("purchases/add", [PurchaseController::class, "add"])->name("purchases.add");
    Route::get("purchases/{purchase}/create", [PurchaseController::class, "create"])->name("purchases.create");
    Route::post("purchases/{purchase}/store", [PurchaseController::class, "store"])->name("purchases.store");
    Route::get("purchase-history", [PurchaseController::class, 'history'])->name("purchase-history.index");

    //Exchange History
    Route::resource("exchange-history", ExchangeHistoryController::class)->only(['index', 'store', 'create']);

    //Safe Transactions
    Route::get("safe-transactions/{safe}", [SafeTransactionController::class, 'index'])->name('safe-transactions.index');
    Route::get("safe-transactions/{safe}/create", [SafeTransactionController::class, 'create'])->name('safe-transactions.create');
    Route::post("safe-transactions/{safe}", [SafeTransactionController::class, 'store'])->name('safe-transactions.store');

    //settings
    Route::get('settings/export', [SettingController::class, 'export'])->name('settings.export');
    Route::post('settings/import', [SettingController::class, 'import'])->name('settings.import');
    Route::resource("settings", SettingController::class)->except(['show']);

    //reports 
    Route::get('reports/orders', [ReportController::class, 'order'])->name('reports.order');
    Route::get('reports/products', [ReportController::class, 'product'])->name('reports.product');
    Route::get('reports/clients', [ReportController::class, 'client'])->name('reports.client');
    Route::get('reports/cars', [ReportController::class, 'car'])->name('reports.car');
    Route::get('reports/car-expenses', [ReportController::class, 'carExpense'])->name('reports.carExpense');
    Route::get('reports/expenses', [ReportController::class, 'expense'])->name('reports.expense');
    Route::get('reports/visits', [ReportController::class, 'visit'])->name('reports.visit');
    Route::get('reports/return-products', [ReportController::class, 'returnProduct'])->name('reports.returnProduct');
    Route::get('reports/suppliers', [ReportController::class, 'supplier'])->name('reports.supplier');
    Route::get('reports/expenses', [ReportController::class, 'expense'])->name('reports.expense');


    //Language Translation
    Route::get('index/{locale}', [HomeController::class, 'lang']);

    //render files inside views/template folder
    Route::get('{any}', [HomeController::class, 'index'])->name('index');
});
