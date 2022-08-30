<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $guard = 'admin';

    protected $fillable = [
        'color_name', 'color_name_ar', 'color'
    ];
}
