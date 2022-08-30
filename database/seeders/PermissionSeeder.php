<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'admin_show', 'admin_create', 'admin_edit', 'admin_delete',
            'slider_show', 'slider_create', 'slider_edit', 'slider_delete',
            'category_show', 'category_create', 'category_edit', 'category_delete', 'category_products',
            'user_show', 'user_create', 'user_edit', 'user_delete', 'user_eye', 'user_cart',
            'color_show', 'color_create', 'color_edit', 'color_delete',
            'size_show', 'size_create', 'size_edit', 'size_delete',
            'brand_show', 'brand_create', 'brand_edit', 'brand_delete',
            'product_show', 'product_create', 'product_edit', 'product_delete', 'product_eye',
            'coupon_show', 'coupon_create', 'coupon_edit', 'coupon_delete',
            'role_show', 'role_create', 'role_edit', 'role_delete', 'role_eye',
            'questionAnswer_show', 'questionAnswer_create', 'questionAnswer_edit', 'questionAnswer_delete',
            'order_show', 'order_edit', 'order_delete', 'order_eye',
            'dashboard', 'notification', 'setting'
        ];
        foreach($permissions as $permission) {
            DB::table('permissions')->insert([
                'name'       => $permission,
                'guard_name' => 'admin'
            ]);
        }
    }
}
