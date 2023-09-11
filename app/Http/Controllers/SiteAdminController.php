<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteAdminController extends Controller
{

    function index(Request $request)
    {
        return view('site.siteAdmin.index');
    }
}
