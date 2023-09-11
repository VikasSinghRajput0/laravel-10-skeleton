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
        switch (Auth::user()->active == 1) {
            case 1:
                /** MasterAdmin  **/
                return redirect()->route('masterAdmin.dashboard');
                break;
                /** GroupAdmin  **/
            case 2:
                return redirect()->route('groupAdmin.dashboard');
                break;
                /** SitAdmin  **/
            case 3:
                return redirect()->route('siteAdmin.dashboard');
                break;
            case 4:
                return redirect('/test');
                break;
            case 5:
                return redirect('/test');
                break;
            default:
                Auth::logout();
                return redirect('/login')->with('error', 'oops something went wrong');
        }
        return redirect()->to('logout')->with('error', "User Suspended, cant login");
    }
}
