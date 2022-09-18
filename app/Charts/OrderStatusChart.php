<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Order;

class OrderStatusChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        return $this->chart->pieChart()
            ->setTitle(__('dashboard.order_status'))
            // ->setSubtitle('Season 2021.')
            ->addData([
                Order::where('status', 'delivered')->get()->count(),
                Order::where('status', 'shipped')->get()->count(),
                Order::where('status', 'cancel')->get()->count(),
            ])
            ->setColors(['#64F164', '#637AFF', '#FF6363'])
            ->setLabels(['Delivered', 'Shipping', 'Cancel']);
    }
}
