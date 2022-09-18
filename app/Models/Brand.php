<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guard = 'admin';

    protected $fillable = [
        'brand', 'brand_ar', 'image'
    ];

    public function products() {
        return $this->hasMany('App\Models\Product', 'brand_id', 'id');
    }
}
