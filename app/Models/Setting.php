<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guard = 'admin';

    protected $fillable = [
        'site_name', 'email','image', 'facebook_url', 'instagram_url','linkedin_url',
        'twitter_url', 'phone', 'location', 'site_name_ar', 'location_ar'
    ];
}
