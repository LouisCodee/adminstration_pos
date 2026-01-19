<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [

            // Business
            'view_business',
            'create_business',
            'update_business',
            'delete_business',
            'manage_business_settings',
            'manage_businesses',

            // Branches
            'view_branches',
            'create_branches',
            'update_branches',
            'delete_branches',
            'assign_users_to_branches',

            // Users
            'view_users',
            'create_users',
            'update_users',
            'delete_users',
            'assign_roles',
            'reset_user_password',
            'manage_system_users',

            // Sales
            'create_sales',
            'edit_sales',
            'cancel_sales',
            'view_sales',
            'refund_sales',

            // Credit Sales
            'create_credit_sales',
            'approve_credit_sales',
            'settle_credit_sales',

            // Discounts & Overrides
            'apply_discounts',
            'override_prices',

            // Inventory - Products
            'view_products',
            'create_products',
            'update_products',
            'delete_products',

            // Inventory - Stock
            'view_stock',
            'adjust_stock',
            'perform_stock_count',
            'approve_stock_adjustment',

            // Pricing
            'view_prices',
            'update_prices',

            // Purchasing
            'view_suppliers',
            'create_suppliers',
            'update_suppliers',
            'delete_suppliers',
            'create_purchases',
            'receive_stock',
            'view_purchases',

            // Accounting
            'view_accounts',
            'manage_accounts',
            'record_expenses',
            'view_expenses',
            'view_financial_reports',

            // Customers
            'view_customers',
            'create_customers',
            'update_customers',
            'delete_customers',

            // Reports
            'view_sales_reports',
            'view_inventory_reports',
            'view_customer_reports',
            'view_user_activity_reports',
            'export_reports',

            // System
            'view_system_logs',
            'manage_integrations',
            'manage_sync',
            'manage_backups',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Roles
        $superAdmin = Role::firstOrCreate(['name' => 'super-admin']);
        $manager = Role::firstOrCreate(['name' => 'manager']);
        $cashier = Role::firstOrCreate(['name' => 'cashier']);
        $storekeeper = Role::firstOrCreate(['name' => 'storekeeper']);
        $accountant = Role::firstOrCreate(['name' => 'accountant']);

        // Assign permissions to roles
        $superAdmin->givePermissionTo(Permission::all());

        $manager->givePermissionTo([
            'view_business',
            'update_business',
            'manage_business_settings',

            'view_branches',
            'create_branches',
            'update_branches',

            'view_users',
            'create_users',
            'update_users',
            'assign_roles',

            'create_sales',
            'view_sales',
            'refund_sales',

            'view_products',
            'create_products',
            'update_products',
            'view_stock',
            'adjust_stock',

            'view_customers',
            'create_customers',

            'view_sales_reports',
            'view_inventory_reports',
            'view_financial_reports',
        ]);

        $cashier->givePermissionTo([
            'create_sales',
            'view_products',
            'view_stock',
            'view_customers',
            'create_customers',
        ]);

        $storekeeper->givePermissionTo([
            'view_products',
            'view_stock',
            'adjust_stock',
            'perform_stock_count',
            'view_suppliers',
            'receive_stock',
        ]);

        $accountant->givePermissionTo([
            'view_sales',
            'view_accounts',
            'view_expenses',
            'view_financial_reports',
            'view_sales_reports',
            'export_reports',
        ]);
    }
}
