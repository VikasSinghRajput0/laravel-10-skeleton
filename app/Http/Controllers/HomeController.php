<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role_id == 1) {
            return redirect()->route('masterAdmin.dashboard');
        } else if (Auth::user()->role_id == 2) {
            return redirect()->route('groupAdmin.dashboard');
        } else if (Auth::user()->role_id == 3) {
            return redirect()->route('siteAdmin.dashboard');
        } else {
            return redirect('302');
        }
        // else {
        //     return redirect()->to('dashboard/index');
        // }
        return redirect()->to('logout')->with('error', "User Suspended, cant login");
    }
}
