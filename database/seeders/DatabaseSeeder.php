<?php

namespace Database\Seeders;

use App\Models\Zone;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolePermissionSeeder::class,
            UserSeeder::class,
            ClientCategorySeeder::class,
            ZoneSeeder::class,
            ClientSeeder::class,
            SupplierSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            WorkTimeSeeder::class,
            CarSeeder::class,
            CarExpensesSeeder::class,
            ContactSeeder::class,
            CouponSeeder::class,
            VisitSeeder::class,
            SafeSeeder::class,
            SafeTransactionSeeder::class,
            ExpenseSeeder::class,
            SettingSeeder::class,
            ExchangeHistorySeeder::class,
            OrderSeeder::class,
            PaymentSeeder::class,
            StandSeeder::class
            // ReturnProductSeeder::class,
        ]);
    }
}
