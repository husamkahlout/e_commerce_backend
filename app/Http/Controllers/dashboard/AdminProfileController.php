<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class AdminProfileController extends Controller
{
    public function index() {
        // dd('lami');
        $admin = auth('admin')->user();
        return view('dashboard.profile.index', compact('admin'));
    }

    public function update(Request $request) {
        $admin = auth('admin')->user();
        $request->validate([
            'name'      => 'required|max:32',
            'email'     => 'required|string|email|max:191|unique:admins,email,'.$admin->id,
            'password'  => 'sometimes|min:6',
        ]);
        $request['password'] = bcrypt($request->password);
        $admin->update($request->all());
        if ($admin) {
            return redirect()->back()->with('success', 'The information has been updated Successfully');
        }
    }
}
