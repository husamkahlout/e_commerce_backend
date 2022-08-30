<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Size;
use App\Models\Color;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard.product.index' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sizes      = Size::all();
        $colors     = Color::all();
        $brands     = Brand::all();
        $categories = Category::all();
        return  view('dashboard.product.create', compact('sizes' , 'colors' , 'categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('product_image')) {
            $uploadImage = $request->file('product_image');
            $nameImage   = time() . '.' . $uploadImage->getClientOriginalExtension();
            $direction   = public_path('image/');
            $uploadImage->move($direction , $nameImage);
            $pathImage   = '/image/' . $nameImage;

            $request['image'] = $pathImage;
        }

        $request['product_new']     = $request['product_new'] ? 1 : 0;
        $product = Product::create($request->all());
        $product->colors()->attach($request->color);
        $product->sizes()->attach($request->size);
        if($product) {
            return redirect()->back()->with('success',  __('message.add_success'));
        } else {
            return back()->with('error', 'That Is Error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('dashboard.product.show', compact('product'));
    }


    public function upload(Request $request, Product $product) {
        if($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $direction   = public_path('image/');

            $file->move($direction , $fileName);
            $pathImage   = '/image/' . $fileName;

            if($pathImage) {
                $product->images()->create([
                    'path'  => $fileName,
                ]);
                return response()->json(['upload_status' => 'success'], 200);
            } else {
                return response()->json(['upload_status' => 'error'], 401);
            }
        }
    }

    public function destroyImage($id)
    {
        $image = Image::findOrFail($id);
        if(\File::exists(public_path($image->image))) {
            \File::delete(public_path($image->image));
        }
        $image->delete();
        return redirect()->back()->with('success', 'Successfully deleted');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sizes       = Size::all();
        $colors      = Color::all();
        $brands      = Brand::all();
        $categories  = Category::all();
        $product     = Product::findOrFail($id);
        return  view('dashboard.product.edit', compact('product', 'sizes', 'colors', 'categories', 'brands'));
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
        $product = Product::findOrFail($id);
        if($request->hasFile('product_image')) {
            $uploadedImage = $request->file('product_image');
            $imageName     = time() . '.' . $uploadedImage->getClientOriginalExtension();
            $direction     = public_path('/image');
            $uploadedImage->move($direction, $imageName);
            $imagePath     = '/image/' . $imageName;

            if(\File::exists(public_path($product->image))) {
                \File::delete(public_path($product->image));
            }
            $request['image'] = $imagePath;
        }
        $request['product_new']  = $request['product_new'] ? 1 : 0;
        $product->colors()->sync($request->color);
        $product->sizes()->sync($request->size);
        $product->fill($request->all());
        $product->update();
            return redirect()->route('product.index')->with('success', __('message.update_success'));
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
            $product = Product::findOrFail($id);
            $product->delete();
            return redirect()->back()->with('success', __('message.delete_success'));
        }
        catch(ModelNotFoundException $ModelNotFoundException) {

            return redirect()->back()->with('error',  __('message.not_found'));
        }
    }

    public function Multidestroy(Request $request) {

        try{
            $multiDeletes = $request->input('MultDelete');
            if($multiDeletes == null) {
                return redirect()->back()->with('error' , __('message.select_item'));
            }
            $count = count($multiDeletes);
            Product::whereIn('id' , $multiDeletes)->delete();
            return redirect()->back()->with('success',  __('message.multi_delete') . $count);
        }
        catch(ModelNotFoundException $ModelNotFoundException) {
            return redirect()->route('product.index')->with('error',  __('message.not_found'));
        }
    }
}
