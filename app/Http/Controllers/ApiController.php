<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Helper;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    /**
     * Login user By Email Password and create token
     * @param  [string] email
     * @param  [string] password
     * @return [string] access_token
     */
    public function loginByEmail(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'active' => 1])) {
            $userData = User::where('email', $request->email)->first();
            if ($userData) {
                $userData->device_token = $request->device_token;
                $userData->api_token =  Str::random(60);
                $userData->api_token_expires_at = now()->addHours(24); // Adjust the expiration time as needed
                $userData->device_type = $request->device_type ?? '';
                $userData->update();
                $responseData = [
                    'success' => true,
                    'message' => 'Login Success',
                    'data' => $userData,
                    'method' => 'POST'
                ];
                return Helper::responseOnSuccess($responseData);
            } else {
                return Helper::responseOnFailure();
            }
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

    /**
     * function to login By Mobile Number -> Generate otp
     * @param Request $request
     * @return void
     */
    public function loginByOtp(Request $request)
    {
        try {
            $verify =  Validator::make($request->all(), [
                'phone_number' => ['required']
            ]);
            if ($verify->fails()) {
                return response()->json([
                    'status_code' => 401,
                    'method' => 'POST',
                    'message' => $verify->getMessageBag()->first(),
                ]);
            } else {
                $result['type'] = "success";
                if ($result['type'] === "success") {
                    $exist = User::where('phone_number', $request->phone_number)->first();
                    if ($exist) {
                        $exist->device_token = $request->device_token;
                        $exist->api_token = Str::random(60);
                        $exist->user_otp = 1234;
                        $exist->update();
                        $responseData = [
                            'success' => true,
                            'message' => 'Otp Send SuccessFully',
                            'data' => ["user_id" => $exist->id, 'phone_number' => $request->phone_number, 'api_token' => $exist->api_token],
                            'method' => 'POST'
                        ];
                        return Helper::responseOnSuccess($responseData);
                    } else {
                        $user = new User([
                            'phone_number' => $request->phone_number,
                            'name' => 'Unknown',
                            'email' => 'unknown' . rand(1000, 10000) . '@mail.com',
                            'password' => Hash::make('12345678'),
                            'api_token' => Str::random(60),
                            'device_token' => $request->device_token ?? "",
                            'user_otp' => 1234,
                        ]);

                        $user->save();
                        $responseData = [
                            'success' => true,
                            'message' => 'Otp Send SuccessFully',
                            'data' => ["user_id" => $user->id, 'phone_number' => $request->phone_number, 'api_token' =>  $user->api_token],
                            'method' => 'POST'
                        ];
                        return Helper::responseOnSuccess($responseData);
                    }
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Something Went Wrong'
                    ]);
                }
            }
        } catch (Exception $e) {
            Log::error($e);
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * fuhnction to verfiy otp
     * @param Request $request
     * @return void
     */
    public function verifyOtp(Request $request)
    {
        try {

            $verify =  Validator::make($request->all(), [
                'phone_number' => 'required',
                'otp' => 'required'
            ]);
            if ($verify->fails()) {
                return response()->json([
                    'status_code' => 401,
                    'method' => 'POST',
                    'message' => $verify->getMessageBag()->first(),
                ]);
            } else {
                if ($request['otp'] == "1234") {
                    $exist = User::where(['phone_number' => $request->phone_number])->first();
                    if ($exist) {
                        $exist->otp_verify = 1;
                        $exist->api_token_expires_at = now()->addHours(24); // Adjust the expiration time as needed
                        $exist->update();
                        $responseData = [
                            'success' => true,
                            'message' => 'OTP Verified.',
                            'data' => ["user_id" => $exist->id, 'phone_number' => $request->phone_number, 'api_token' => $exist->api_token],
                            'method' => 'POST'
                        ];
                        return Helper::responseOnSuccess($responseData);
                    } else {
                        return response()->json(['status_code' => 401, 'message' => 'Please check the number agian.']);
                    }
                } else {
                    $responseData = [
                        'success' => false,
                        'message' => 'OTP Verification failed',
                        'data' => [],
                        'method' => 'POST'
                    ];
                    return Helper::responseOnFailure($responseData);
                }
            }
        } catch (Exception $e) {
            dd($e);
            Log::error($e);
            return Helper::responseOnFailure();
        }
    }
}
