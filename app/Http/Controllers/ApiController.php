<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Helper;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    /**
     * Login user and create token
     * @param  [string] email
     * @param  [string] password
     * @return [string] access_token
     */
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'active' => 1])) {
            $userData = User::where('email', $request->email)->first();
            $responseData = [
                'success' => true,
                'message' => 'Login Success',
                'data' => $userData,
                'method' => 'POST'
            ];
            return Helper::responseOnSuccess($responseData);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Credentials'
            ]);
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function logout(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'user_id' => 'required|numeric|exists:users,id'
            ]);
            if ($validator->fails()) {
                $responseData = [
                    'message' => $validator->getMessageBag()->first(),
                ];
                return Helper::responseOnValidationFailure($responseData);
            }
            $user = User::find($request->user_id);
            if ($user) {
                $user->api_token = null;
                $user->device_token = null;
                $user->save();
                $responseData = ['data' => [], 'message' => 'User logged out', 'method' => 'POST'];
                return Helper::responseOnSuccess($responseData);
            }
        } catch (\Exception $e) {
            return Helper::responseOnFailure();
        }
    }
}
