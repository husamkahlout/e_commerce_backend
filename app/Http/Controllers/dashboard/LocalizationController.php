<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocalizationController extends Controller
{
    public function change($lang = 'en') {
        \Session::put('local', $lang);
        return redirect()->back();
    }
}
