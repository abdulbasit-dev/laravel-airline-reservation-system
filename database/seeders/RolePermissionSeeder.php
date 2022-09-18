<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions  = [
            "user_add",
            "user_edit",
            "user_delete",
            "user_view",
            "user_export",
            "user_import",

            "role_add",
            "role_edit",
            "role_delete",
            "role_view",
            "role_export",
            "role_import",

            "supplier_add",
            "supplier_edit",
            "supplier_view",
            "supplier_delete",
            "supplier_export",
            "supplier_import",

            "brand_add",
            "brand_edit",
            "brand_view",
            "brand_delete",
            "brand_export",
            "brand_import",

            "car_add",
            "car_edit",
            "car_view",
            "car_delete",
            "car_export",
            "car_import",

            "carExpense_add",
            "carExpense_edit",
            "carExpense_view",
            "carExpense_delete",
            "carExpense_export",
            "carExpense_import",

            "product_add",
            "product_edit",
            "product_view",
            "product_delete",
            "product_export",
            "product_import",

            "category_add",
            "category_edit",
            "category_view",
            "category_delete",
            "category_export",
            "category_import",

            "client_add",
            "client_edit",
            "client_view",
            "client_delete",
            "client_export",
            "client_import",

            "zone_add",
            "zone_edit",
            "zone_view",
            "zone_delete",
            "zone_export",
            "zone_import",

            "clientCategory_add",
            "clientCategory_edit",
            "clientCategory_view",
            "clientCategory_delete",
            "clientCategory_export",
            "clientCategory_import",

            "expense_add",
            "expense_edit",
            "expense_view",
            "expense_delete",
            "expense_export",
            "expense_import",


            "workTime_view",
            "workTime_export",

            "order_add",
            "order_edit",
            "order_view",
            "order_delete",
            "order_export",
            "order_import",
            "order_delivered",

            "coupon_add",
            "coupon_edit",
            "coupon_view",
            "coupon_delete",
            "coupon_export",
            "coupon_import",

            "cart_add",
            "cart_edit",
            "cart_view",
            "cart_delete",

            "contact_add",
            "contact_edit",
            "contact_view",
            "contact_delete",
            "contact_export",
            "contact_import",

            "tracking_history_view",
            "tracking_live_view",
            "tracking_add",

            "stand_view",
            "stand_add",
            "stand_delete",
            "stand_export",

            "visit_view",
            "visit_add",
            "visit_delete",
            "visit_export",

            "visitDescription_view",
            "visitDescription_add",
            "visitDescription_delete",
            "visitDescription_export",

            "expense_view",
            "expense_add",
            "expense_edit",
            "expense_delete",

            "expenseTag_view",
            "expenseTag_add",
            "expenseTag_edit",
            "expenseTag_delete",
            "expenseTag_export",
            "expenseTag_import",

            "new_order_view",
            "assign_driver",
            "cancel_order",
            "driver_view_order",

            "payment_view",
            "client_payment_view",

            "get_paid",

            "setting_add",
            "setting_edit",
            "setting_view",
            "setting_delete",
            "setting_export",
            "setting_import",

            "update_fcm",

            "purchase_add",
            "purchase_edit",
            "purchase_view",
            "purchase_delete",
            "purchase_export",
            "purchase_import",

            "returnProduct_add",
            "returnProduct_edit",
            "returnProduct_view",
            "returnProduct_delete",
            "returnProduct_export",
            "returnProduct_import",

            "warehouse_view",

            "safe_add",
            "safe_edit",
            "safe_view",
            "safe_delete",
            "safe_export",
            "safe_import",

            "report_view",
            "orderReport_view",
            "productReport_view",
            "clientReport_view",
            "carReport_view",
            "carExpenseReport_view",
            "visitReport_view",
            "expenseReport_view",
            "supplierReport_view",
            "returnProductReport_view",

            // "_add",
            // "_edit",
            // "_view",
            // "_delete",
            // "_export",
            // "_import",
        ];

        //create permission
        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
            ]);
        }

        $roles = ['admin', 'driver', 'sale-representative', 'warehouse-manger'];

        $srPermissions = [
            "carExpense_add",
            "carExpense_view",
            "product_view",
            "client_add",
            "client_edit",
            "client_view",
            "clientCategory_view",
            "order_add",
            "order_view",
            "cart_add",
            "cart_edit",
            "cart_view",
            "cart_delete",
            "contact_add",
            "coupon_view",
            "stand_add",
            "stand_view",
            "visit_add",
            "visit_view",
            "visitDescription_view",
            "payment_view",
            "get_paid",
            "client_payment_view",
            "update_fcm",
            "tracking_add",
        ];

        $driverPermissions = [
            "carExpense_add",
            "carExpense_view",
            "product_view",
            "client_add",
            "client_edit",
            "client_view",
            "clientCategory_view",
            "order_view",
            "contact_add",
            "coupon_view",
            "stand_add",
            "stand_view",
            "visit_add",
            "visit_view",
            "visitDescription_view",
            "payment_view",
            "get_paid",
            "client_payment_view",
            "update_fcm",
            "tracking_add",
            "driver_view_order",
            "order_delivered",
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate([
                'name' => $role,
            ]);
        }

        //give permission to sale representative role
        $srRole = Role::findByName('sale-representative');
        $srRole->givePermissionTo($srPermissions);

        //give permission to driver role
        $driverRole = Role::findByName('driver');
        $driverRole->givePermissionTo(array_merge($srPermissions, $driverPermissions));
    }
}
