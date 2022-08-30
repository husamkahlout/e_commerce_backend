<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;

class AuthUserController extends Controller
{
    use GeneralTrait;

    public function login(Request $request) {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
            // 'device_token' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        $user = User::where('email', $request->email)->first();
    
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return $this->sendError("The provided credentials are incorrect.");
            // return response()->json('The provided credentials are incorrect.');
        }
        return $user->createToken($request->email)->plainTextToken;
    }

    public function register(Request $request) {
        $rules = [
            'email'     => 'required|string|email|max:191|unique:users',
            'password' => 'required|min:6',
            // 'device_token' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            // 'device_token' => $request->device_token
        ]);
        $user = User::where('email', $request->email)->first();
        return $user->createToken($request->email)->plainTextToken;
    }

    public function getUser(Request $request) {
        $user =  $request->user();
        return $this->sendResponse('user', $user);
    }

    public function logout(Request $request) {
        $user = $request->user();
        $user->update(['device_token' => NULL]);
        $user->tokens()->delete();
        return $this->sendSuccess('user logged out');
    }

    public function forgot() {
        $credentials = request()->validate(['email' => 'required|email']);

        Password::sendResetLink($credentials);

        return response()->json(["msg" => 'Reset password link sent on your email id.']);
    }


    // public function reset() {
        
    //     $credentials = request()->validate([
    //         'email' => 'required|email',
    //         'token' => 'required|string',
    //         'password' => 'required|string|confirmed'
    //     ]);

    //     $reset_password_status = Password::reset(
    //         $request->only('email', 'password', 'password_confirmation', 'token'),
    //         function ($user, $password) {
    //             $user->forceFill([
    //                 'password' => Hash::make($password)
    //             ])->setRememberToken(Str::random(60));

    //             $user->save();

    //             event(new PasswordReset($user));
    //             // $user->password = Hash::make($password);
    //             // $user->save();
    //     });

    //     if ($reset_password_status == Password::INVALID_TOKEN) {
    //         return response()->json(["msg" => "Invalid token provided"], 400);
    //     }

    //     return response()->json(["msg" => "Password has been successfully changed"]);
    // }
}