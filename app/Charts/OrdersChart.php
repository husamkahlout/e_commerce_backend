<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Order;
use Carbon\Carbon;

class OrdersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        $startJan = Carbon::now()->startOfYear();
        $endJan = Carbon::now()->startOfYear()->addMonth();
        $ordersJan = Order::whereBetween('created_at', [$startJan, $endJan])->get();
        $totalJan = 0;
        foreach ($ordersJan as $order){
            $totalJan += (float)$order->newTotal;
        }
        
        $startFeb = Carbon::now()->startOfYear()->addMonth();
        $endFeb = Carbon::now()->startOfYear()->addMonth(2);
        $ordersFeb = Order::whereBetween('created_at', [$startFeb, $endFeb])->get();
        $totalFeb = 0;
        foreach ($ordersFeb as $order){
            $totalFeb += (float)$order->newTotal;
        }
        
        $startMar = Carbon::now()->startOfYear()->addMonth(2);
        $endMar = Carbon::now()->startOfYear()->addMonth(3);
        $ordersMar = Order::whereBetween('created_at', [$startMar, $endMar])->get();
        $totalMar = 0;
        foreach ($ordersMar as $order){
            $totalMar += (float)$order->newTotal;
        }
        
        $startApr = Carbon::now()->startOfYear()->addMonth(3);
        $endApr = Carbon::now()->startOfYear()->addMonth(4);
        $ordersApr = Order::whereBetween('created_at', [$startApr, $endApr])->get();
        $totalApr = 0;
        foreach ($ordersApr as $order){
            $totalApr += (float)$order->newTotal;
        }
        
        $startMay = Carbon::now()->startOfYear()->addMonth(4);
        $endMay = Carbon::now()->startOfYear()->addMonth(5);
        $ordersMay = Order::whereBetween('created_at', [$startMay, $endMay])->get();
        $totalMay = 0;
        foreach ($ordersMay as $order){
            $totalMay += (float)$order->newTotal;
        }
        
        $startJune = Carbon::now()->startOfYear()->addMonth(5);
        $endJune = Carbon::now()->startOfYear()->addMonth(6);
        $ordersJune = Order::whereBetween('created_at', [$startJune, $endJune])->get();
        $totalJune = 0;
        foreach ($ordersJune as $order){
            $totalJune += (float)$order->newTotal;
        }
        
        $startJuly = Carbon::now()->startOfYear()->addMonth(6);
        $endJuly = Carbon::now()->startOfYear()->addMonth(7);
        $ordersJuly = Order::whereBetween('created_at', [$startJuly, $endJuly])->get();
        $totalJuly = 0;
        foreach ($ordersJuly as $order){
            $totalJuly += (float)$order->newTotal;
        }
        
        $startAug = Carbon::now()->startOfYear()->addMonth(7);
        $endAug = Carbon::now()->startOfYear()->addMonth(8);
        $ordersAug = Order::whereBetween('created_at', [$startAug, $endAug])->get();
        $totalAug = 0;
        foreach ($ordersAug as $order){
            $totalAug += (float)$order->newTotal;
        }
        
        $startSep = Carbon::now()->startOfYear()->addMonth(8);
        $endSep = Carbon::now()->startOfYear()->addMonth(9);
        $ordersSep = Order::whereBetween('created_at', [$startSep, $endSep])->get();
        $totalSep = 0;
        foreach ($ordersSep as $order){
            $totalSep += (float)$order->newTotal;
        }
        
        $startOct = Carbon::now()->startOfYear()->addMonth(9);
        $endOct = Carbon::now()->startOfYear()->addMonth(10);
        $ordersOct = Order::whereBetween('created_at', [$startOct, $endOct])->get();
        $totalOct = 0;
        foreach ($ordersOct as $order){
            $totalOct += (float)$order->newTotal;
        }
        
        $startNov = Carbon::now()->startOfYear()->addMonth(10);
        $endNov = Carbon::now()->startOfYear()->addMonth(11);
        $ordersNov = Order::whereBetween('created_at', [$startNov, $endNov])->get();
        $totalNov = 0;
        foreach ($ordersNov as $order){
            $totalNov += (float)$order->newTotal;
        }
        
        $startDec = Carbon::now()->startOfYear()->addMonth(11);
        $endDec = Carbon::now()->startOfYear()->addMonth(12);
        $ordersDec = Order::whereBetween('created_at', [$startDec, $endDec])->get();
        $totalDec = 0;
        foreach ($ordersDec as $order){
            $totalDec += (float)$order->newTotal;
        }

        // $start = Carbon::now()->subDays(30);        // Carbon::now()->subMonth()
        // $end = Carbon::now();
        // $orders = Order::whereBetween('created_at', [$start, $end])->get();
        // $totalSales = 0;
        // foreach ($orders as $order){
        //     $totalSales += (float)$order->newTotal;
        // }
        return $this->chart->areaChart()
            ->setTitle(__('dashboard.order_sales'))
            // ->setSubtitle('Physical sales vs Digital sales.')
            ->addData('Order sales',
            [
                $totalJan, $totalFeb, $totalMar, $totalApr, $totalMay, $totalJune, $totalJuly, $totalAug, $totalSep, $totalOct, $totalNov, $totalDec
            ])
            // ->addData('Digital sales', [70, 29, 77, 28, 55, 45, 70, 29, 77, 28, 55, 45])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']);
    }
}
