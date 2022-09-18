<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Category;

class CategoryProductChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $categories = Category::where('parent_id', null)->get();
        $categoryName = Category::where('parent_id', null)->pluck('name')->toArray();
        $categoryProducts = [];
        foreach ($categories as $category){ 
            $categoryProducts[] = $category->products->count();
        }
        return $this->chart->donutChart()
            ->setTitle(__('dashboard.category_with_products_count'))
            // ->setSubtitle('Season 2021.')
            ->addData(
                $categoryProducts
            )
            ->setLabels($categoryName);
    }
}
