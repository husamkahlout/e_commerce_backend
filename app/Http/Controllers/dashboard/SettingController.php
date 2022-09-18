<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;

class SettingController extends Controller
{

    public function index() {
        $setting = Setting::latest()->first();
        return view('dashboard.setting.index', compact('setting'));
    }

    public function update(SettingRequest $request) {
        $setting = Setting::latest()->first();

        if($request->hasFile('setting_image')) {
            $uploadedImage = $request->file('setting_image');
            $imageName     = time() . '.' . $uploadedImage->getClientOriginalExtension();
            $direction     = public_path('/image');
            $uploadedImage->move($direction, $imageName);
            $imagePath     = '/image/' . $imageName;

            if(\File::exists(public_path($setting->image))) {
                \File::delete(public_path($setting->image));
            }
            $request['image'] = $imagePath;
        }

        if($request->image != true) {
            return redirect()->back()->with('error', 'Upload Image');
        }
        $setting->fill($request->all());
        $setting->update();
            return redirect()->back()->with('success',  __('message.update_info'));
    }
}
