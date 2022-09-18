<?php

namespace App\Http\Controllers\Api;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use App\Models\OrderProduct;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    use GeneralTrait;

    public function index(){
        $reviews = Review::all();
        return $this->sendResponse('reviews', $reviews);
    }

    public function getAvg($id) {
        $product = Product::findOrFail($id)->reviews()->avg('rating');
        $productAvg = number_format($product, 2);
        return $this->sendResponse('reviews', $productAvg);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Review::create($request->all());
            $orderProduct = OrderProduct::where('order_id', $request->order_id)->where('product_id', $request->product_id)->first();
            // return response()->json($orderProduct);
            $orderProduct->update(['rating' => 1]);
                return $this->sendSuccess('added review successfully');
        } catch (\Exception $ex) {
            return $this->sendError($ex->getMessage());
        }
    }

}
