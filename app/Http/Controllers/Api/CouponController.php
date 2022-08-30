<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Order;
use App\Traits\GeneralTrait;

class CouponController extends Controller
{
    use GeneralTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::all();
        return $this->sendResponse('coupons', $coupons, 'All Coupon');
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
            $coupon = Coupon::create($request->all());
                return $this->sendSuccess('added coupon successfully');
        } catch (\Exception $ex) {
            return $this->sendError($ex->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $coupon = Coupon::findOrFail($id);
        try {
            $coupon->update($request->all());
                return $this->sendSuccess('update coupon successfully');
        } catch (\Exception $ex) {
            return $this->sendError($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        if(empty($coupon)) {
            return $this->sendError('Coupon Not Found');
        }
        try{
            $coupon->delete();
            return $this->sendSuccess('delete coupon successfully');
        } catch (\Exception $ex) {
            return $this->sendError($ex->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function checkCoupon(Request $request) {
        $date = today()->format('Y-m-d');
        $coupon = Coupon::where('code', $request->coupon_code)
            ->where('start_date', '<=', $date)->where('end_date', '>=', $date)->first();
        if(! $coupon) {
            return $this->sendError('Invalid coupon code. please try again');
        }
        $order = Order::where('user_id', $request->id)->where('discount_code', $request->coupon_code)->first();
        if($coupon->repeat_usage == 'not_allowed' && $order != null) {
            return $this->sendError('Invalid coupon code. please try again');
        }
        $discount = $coupon->discount($request->total);
        $newTotal = $request->total - $discount;
        $coupon = array(
            "code" => $request->coupon_code,
            "newTotal"=> $newTotal,
            "discount"=> (float)$discount,
        );
        return $this->sendResponse('coupons', $coupon, 'All Coupon');
    }
}