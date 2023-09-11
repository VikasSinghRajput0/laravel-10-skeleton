<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupAdminController extends Controller
{


    function index(Request $request)
    {
        return view('site.groupAdmin.index');
    }
}
