<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Coupon;
use App\Http\Requests\CouponRequest;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::all();
        return view('dashboard.coupon.index' , compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request)
    {
        $coupon = Coupon::create($request->all());
            return redirect()->back()->with('success', __('message.add_success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('dashboard.coupon.edit' , compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CouponRequest $request, $id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->update($request->all());
            return redirect()->route('coupon.index')->with('success', __('message.update_success'));
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
            return redirect()->route('coupon.index')->with('error', __('message.not_found'));
        }
        try{
            $coupon->delete();
            return redirect()->back()->with('success',  __('message.delete_success'));
        }
        catch(ModelNotFoundException $ModelNotFoundException) {
            return redirect()->route('coupon.index')->with('error', __('message.error_delete'));
        }
    }

    public function Multidestroy(Request $request) {

        try{
            $multiDeletes = $request->input('MultDelete');
            if($multiDeletes == null) {
                return redirect()->back()->with('error', __('message.select_item'));
            }
            $count = count($multiDeletes);
            Coupon::whereIn('id' , $multiDeletes)->delete();
            return redirect()->back()->with('success', __('message.multi_delete') . $count);
        }
        catch(ModelNotFoundException $ModelNotFoundException) {

            return redirect()->route('coupon.index')->with('error', __('message.not_found'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function save_coupon(Request $request) {
        $coupon = Coupon::where('code', $request->coupon_code)->first();
        if(! $coupon) {
            return back()->with('error', 'Invalid coupon code. please try again');
        }
        session()->put('coupon', [
            'name'      => $coupon->code,
            'discount'  => $coupon->discount(Cart::Subtotal()),
        ]);

        return back()->with('success', 'Coupon has been applied!');
    }

    /**
     * Remove the Coupon In Front End
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete_coupon() {
        session()->forget('coupon');
        return redirect()->route('checkout.index')->with('success', 'Coupon has been removed.');
    }


}
