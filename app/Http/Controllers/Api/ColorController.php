<?php

namespace App\Http\Controllers\Api;

use App\Models\Color;
use App\Http\Requests\ColorRequest;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    use GeneralTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::all();
        return $this->sendResponse('colors', $colors, 'All Color');
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
            Color::create($request->all());
                return $this->sendSuccess('added color successfully');
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
        $color = Color::findOrFail($id);
        try {
            $color->update($request->all());
                return $this->sendSuccess('update color successfully');
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
        $color = Color::findOrFail($id);
        if(empty($color)) {
            return $this->sendError('Color Not Found');
        }
        try{
            $color->delete();
            return $this->sendSuccess('delete color successfully');
        } catch (\Exception $ex) {
            return $this->sendError($ex->getMessage());
        }
    }
}
