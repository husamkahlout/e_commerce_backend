<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $guard = 'admin';

    protected $fillable = [
        'size', 'size_ar'
    ];
}
