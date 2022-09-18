<?php

namespace App\Http\Controllers\Api;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use App\Http\Requests\AddressRequest;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Validation\ValidationException;

class AddressController extends Controller
{
    use GeneralTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adress = Address::all();
        return $this->sendResponse('adress', $adress, 'All Dress');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'city'          => 'required',
            'neighourhood'  => 'required',
            'street'        => 'required',
            'user_id'       => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        try {
            Address::create($request->all());
                return $this->sendSuccess('added address successfully');
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


    public function updateDefault(Request $request, $id) {
        Address::where('user_id', $request->user_id)->where('default', 1)->update([
            'default' => 0,
        ]);
        $address = Address::findOrFail($id);
        $address->update(['default' => $request->default]);
            return $this->sendSuccess('update address successfully');
    }

    public function update(Request $request, $id)
    {
        $address = Address::findOrFail($id);
        $address->update($request->all());
            return $this->sendSuccess('update address successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::findOrFail($id);
        if(empty($address)) {
            return $this->sendError('Address Not Found');
        }
        try{
            $address->delete();
            return $this->sendSuccess('delete address successfully');
        }
        catch(\Exception $ex) {
            return $this->sendError($ex->getMessage());
        }
    }
}
