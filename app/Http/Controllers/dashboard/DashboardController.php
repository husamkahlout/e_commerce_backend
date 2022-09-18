<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Charts\CategoryProductChart;
use App\Charts\OrderStatusChart;
use App\Charts\OrdersChart;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index(CategoryProductChart $chart, OrderStatusChart $orderStatusChart, OrdersChart $ordersChart) {
        $orders = Order::orderBy('created_at', 'desc')->take(10)->get();
        return view('dashboard.dashboard', [
            'chart' => $chart->build(),
            'orderStatusChart'  => $orderStatusChart->build(),
            'ordersChart'       => $ordersChart->build(),
            'orders'            => $orders,
        ]);
    }

    
}
