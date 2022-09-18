<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\GeneralTrait;
use App\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
{

    use GeneralTrait;

    public function index() {
        $categories = Category::where('parent_id', null)->get();
        // $categories = Category::with('subcategory')->get();
        return $this->sendResponse('categories', $categories);
    }

    public function getChildCategory($id) {
        $categories = Category::where('parent_id', $id)->with('subcategory')->get();
        return $this->sendResponse('categories', $categories);
    }

    // public function getCategroyProducts($id) {
    //     $products = Category::findOrFail($categoryId)->products;
    //     return $this->sendResponse('products', $products);
    // }

    public function store(Request $request)
    {
        if($request->hasFile('category_image')) {
            $uploadImage = $request->file('category_image');
            $nameImage   = time() . '.' . $uploadImage->getClientOriginalExtension();
            $direction   = public_path('image/');
            $uploadImage->move($direction , $nameImage);
            $pathImage   = '/image/' . $nameImage;

            $request['image'] = $pathImage;
        }
        try {
            Category::create($request->all());
                return $this->sendSuccess('added category successfully');
        } catch (\Exception $ex) {
            return $this->sendError($ex->getMessage());
        }
    }

    public function changeStatus(Request $request) {
       //validation
        Category::where('id', $request->id)->update(['active' => $request->active]);
        return $this->sendResponse('تم تغيير الحاله بنجاح');
    }

}
