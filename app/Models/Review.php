<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guard = 'admin';

    protected $fillable = [
        'user_id', 'product_id', 'order_id','rating', 'comment',
    ];
}
