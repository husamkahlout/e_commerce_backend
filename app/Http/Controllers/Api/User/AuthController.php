<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;
use Auth;
use App\Models\User;

class AuthController extends Controller
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

    public function userAddress($id) {
        $user = User::find($id);
        $userAddress = $user->Address;
        return $this->sendResponse('userAddress', $userAddress);
    }

    public function getUser() {
        $user = Auth::guard('user-api')->user();
        return $this->sendResponse('user', $user);
    }

    public function login(Request $request) {

        try {
            $rules = [
                "email" => "required",
                "password" => "required"
            ];

            $validator = Validator::make($request->all(), $rules);
            //login
            $credentials = $request->only(['email', 'password', 'device_token']);

            $token = Auth::guard('user-api')->attempt($credentials);  //generate token

            if (!$token)
                return $this->sendError($token);

            $user = Auth::guard('user-api')->user();
            $user->api_token = $token;
            // User::findOrFail($id)->update(['status' => $request->status]);
            // $user->device_token = $request->device_token;
            // $user->update(['device_token' => $request->device_token]);
            //return token
            return $this->sendResponse('user', $user, 'User');  //return json response

        } catch (\Exception $ex) {
            // return sendError($ex->getMessage());
            return sendError($user->device_token);
        }
    }

    public function register(Request $request) {
        try {
            $rules = [
                'name'  => 'required',
                "email" => "required",
                "password" => "required",
            ];
            $validator = Validator::make($request->all(), $rules);
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'device_token' => $request->device_token
            ]);

            $credentials = $request->only(['email', 'password']);

            $token = Auth::guard('user-api')->attempt($credentials);  //generate token

            if (!$token)
                return $this->sendError('بيانات الدخول غير صحيحة');

            $user = Auth::guard('user-api')->user();
            $user->api_token = $token;

            return $this->sendResponse('user', $user, 'User');  //return json response
        } catch (\Exception $ex) {
            return response()->json($ex->getMessage());
        }
    }

    public function logout(Request $request) {
        $token = $request->header('auth-token');
        if($token) {
            try {
                JWTAuth::setToken($token)->invalidate(); //logout
            }catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e){
                return  $this->sendError('some thing went wrongs');
            }
            return $this->sendSuccess('Logged out successfully');
        } else {
            $this->sendError('some thing went wrongs');
        }
    }
}