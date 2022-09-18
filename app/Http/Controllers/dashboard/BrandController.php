<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Brand;
use App\Http\Requests\BrandRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('dashboard.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        if($request->hasFile('brand_image')) {
            $uploadImage = $request->file('brand_image');
            $nameImage   = time() . '.' . $uploadImage->getClientOriginalExtension();
            $direction   = public_path('image/');
            $uploadImage->move($direction , $nameImage);
            $pathImage   = '/image/' . $nameImage;

            $request['image'] = $pathImage;
        }
        $brand = Brand::create($request->all());
        if($brand){
            return redirect()->route('brand.index')->with('success', __('message.add_success'));
        } else{
            return back()->with('error', 'يوجد خطأ في البيانات');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('dashboard.brand.edit', compact('brand'));
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
        $request->validate([
            'brand'     => 'required|unique:brands,brand,'.$brand->id,
        ]);
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
        $brand->fill($request->all());
        $brand->update();
            return redirect()->route('brand.index')->with('success', __('message.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $brand = Brand::findOrFail($id);
            $brand->delete();
            return redirect()->back()->with('success', __('message.delete_success'));
        }
        catch(ModelNotFoundException $ModelNotFoundException) {

            return redirect()->route('brand.index')->with('error', __('message.not_found'));
        }
    }

    public function Multidestroy(Request $request) {

        try{
            $multiDeletes = $request->input('MultDelete');
            if($multiDeletes == null) {
                return redirect()->back()->with('error', __('message.select_item'));
            }
            $count = count($multiDeletes);
            Brand::whereIn('id' , $multiDeletes)->delete();
            return redirect()->back()->with('success', __('message.multi_delete') . $count);
        }
        catch(ModelNotFoundException $ModelNotFoundException) {
            return redirect()->route('brand.index')->with('error', __('message.not_found'));
        }
    }
}
