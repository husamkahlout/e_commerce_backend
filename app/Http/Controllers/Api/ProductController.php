<?php

namespace App\Http\Controllers\Api;

use App\Models\Size;
use App\Models\Color;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    use GeneralTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category', 'sizes', 'colors', 'brand', 'reviews', 'images')->get();
        // $productColor = Product::find(3)->colors;
        return $this->sendResponse('products', $products, 'All Product');
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
        try {
            return $this->sendSuccess('added product successfully');
        } catch (\Exception $ex) {
            return $this->sendError($ex->getMessage());
        }
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
        try {
            $product->update($request->all());
                return $this->sendSuccess('update size successfully');
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
        $product = Product::findOrFail($id);
        if(empty($product)) {
            return $this->sendError('Product Not Found');
        }
        try{
            $product->delete();
            return $this->sendSuccess('delete product successfully');
        } catch (\Exception $ex) {
            return $this->sendError($ex->getMessage());
        }
    }

    public function filterProduct(Request $request) {
        $products = Product::where('price' , '>', 0);
        if($request->categoryId != null) {
            $products->whereIn('category_id', $request->categoryId);
        }
        if($request->brandId != null) {
            $products->whereIn('brand_id', $request->brandId);
        }
        if($request->colorId != null) {
            $products->whereHas('colors', function($q) {
                $q->whereIn('color_id', request()->colorId);
            });
        }
        if($request->sizeId != null) {
            $products->whereHas('sizes', function($q) {
                $q->whereIn('size_id', request()->sizeId);
            });
        }
        if($request->has('low_price')) {
            $products->where('price', '>=', $request->low_price);
        }
        if($request->has('high_price')) {
            $products->where('price', '<=', $request->high_price);
        }
        if($request->has('rating')) {
            $products->filter(function($product){
                return $product->reviews->avg('rating') == $request->low_price;
            });
        }
        return $this->sendResponse('products', $products->with('category', 'sizes', 'colors', 'brand', 'reviews', 'images')->get());
    }
}
