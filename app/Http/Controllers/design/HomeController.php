<?php

namespace App\Http\Controllers\design;

use App\Models\Color;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index() {
        $sliders           = Slider::all();
        $first_category    = Category::orderBy('created_at' , 'desc')->first();
        $second_category   = Category::orderBy('created_at' , 'desc')->skip(1)->take(1)->get()->first();
        $category3         = Category::orderBy('created_at' , 'desc')->skip(2)->take(1)->get()->first();
        $category4         = Category::orderBy('created_at' , 'desc')->skip(3)->take(1)->get()->first();
        $category5         = Category::orderBy('created_at' , 'desc')->skip(4)->take(1)->get()->first();
        $categories        = Category::all();
        $products          = Product::all();
        $colors            = Color::all();
        $brands            = Brand::all();
        return view('design.index', compact('sliders', 'first_category', 'second_category', 'category3',
        'category4', 'category5', 'categories', 'products', 'colors', 'brands'));
        // return view('welcome');
    }

    // public function product_detials($id) {
    //     return view();
    // }
}
