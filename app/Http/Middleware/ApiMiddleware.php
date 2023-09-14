<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            if ($request->header('authorization')) {
                $token = explode(" ", $request->header('authorization'));
                if ($token[0] === 'Bearer') {
                    $user = User::where('api_token', $token[1]);
                    if ($user->exists()) {
                        $request->request->add(['user' => $user->get()->toArray()[0]]);
                        if (!Auth::check()) {
                            Auth::loginUsingId($user->get()->toArray()[0]['id'], true);
                        }
                        return $next($request);
                    }
                } else {
                    return response()->json(["error" => false, "data" => "", "message" => "No Bearer Found"], 401);
                }
            } elseif ($request->input('token') !== null) {
                $user = User::where('api_token', $request->input('token'));
                if ($user->exists()) {
                    $request->request->add(['user' => $user->get()->toArray()[0]]);
                    if (!Auth::check()) {
                        Auth::loginUsingId($user->get()->toArray()[0]['id'], true);
                    }
                    return $next($request);
                }
            }
            return response()->json(["status_code" => 401, "error" => false, "data" => null, "message" => "Not Authoirsed"], 401);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(["status_code" => 401, "error" => false, "data" => "", "message" => "something went wrong please try again"], 401);
        }
    }
}
