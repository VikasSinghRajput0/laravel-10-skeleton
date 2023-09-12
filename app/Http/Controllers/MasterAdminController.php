<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterAdminController extends Controller
{
    function index(Request $request)
    {
        return view('site.masterAdmin.index');
    }
}
