<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    use GeneralTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return $this->sendResponse('users', $users, 'All Users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show(Request $request)
    // {
    //     $user = $request->user();
    //     return $this->sendResponse('user', $user);
    //     $user->update(['device_token' => NULL]);
    //     $user->tokens()->delete();
    //     return $this->sendSuccess('user logged out');
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if($request->imageBase64 != null) {
            $realImage = base64_decode($request->imageBase64);
            $imageName = $request->imageName;
            file_put_contents("image\\" . $imageName, $realImage);
            $request['image'] = $imageName;
        }
        $rules = [
            'name'          => 'required',
            'email' => ['required', 'string', 'email', 'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        $request['password'] = bcrypt($request->password);
        // $request['name'] = $request->name;
        $user->update($request->all());
        return $this->sendResponse('user', $user);
            // return $this->sendSuccess('update user successfully');
    }
}
