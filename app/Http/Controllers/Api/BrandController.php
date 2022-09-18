<?php

namespace App\Http\Controllers\Api;

use App\Models\Brand;
use App\Http\Requests\BrandRequest;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    use GeneralTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return $this->sendResponse('brands', $brands, 'All Brand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('brand_image')) {
            $uploadImage = $request->file('brand_image');
            $nameImage   = time() . '.' . $uploadImage->getClientOriginalExtension();
            $direction   = public_path('image/');
            $uploadImage->move($direction , $nameImage);
            $pathImage   = '/image/' . $nameImage;

            $request['image'] = $pathImage;
        }
        try {
            Brand::create($request->all());
                return $this->sendSuccess('added brand successfully');
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
        $brand = Brand::findOrFail($id);
        if($request->hasFile('brand_image')) {
            $uploadedImage = $request->file('brand_image');
            $imageName     = time() . '.' . $uploadedImage->getClientOriginalExtension();
            $direction     = public_path('/image');
            $uploadedImage->move($direction, $imageName);
            $imagePath     = '/image/' . $imageName;

            if(\File::exists(public_path($brand->image))) {
                \File::delete(public_path($brand->image));
            }
            $request['image'] = $imagePath;
        }
        $brand->update($request->all());
            return $this->sendSuccess('update brand successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        if(empty($brand)) {
            return $this->sendError('Brand Not Found');
        }
        try{
            $brand->delete();
            return $this->sendSuccess('delete brand successfully');
        }
        catch(\Exception $ex) {
            return $this->sendError($ex->getMessage());
        }
    }
}
