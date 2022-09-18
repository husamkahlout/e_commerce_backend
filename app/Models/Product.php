<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guard = 'admin';

    protected $fillable = [
        'name', 'name_ar','image', 'price', 'quantity', 'category_id', 'details', 'price_offer', 'details_ar', 'product_new', 'brand_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand', 'brand_id', 'id');
    }

    public function colors()
    {
        return $this->belongsToMany('App\Models\Color', 'product_color', 'product_id', 'color_id');
    }

    public function sizes()
    {
        return $this->belongsToMany('App\Models\Size', 'product_size', 'product_id', 'size_id');
    }

    public function images() {
        return $this->hasMany('App\Models\Image', 'product_id', 'id');
    }

    public function reviews() {
        return $this->hasMany('App\Models\Review', 'product_id', 'id');
    }

    // public function orders() {
    //     return $this->belongsToMany('App\Order', 'order_products', 'product_id', 'order_id');
    // }
}
