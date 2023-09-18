<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{   
    public function getUsers(){
        $user = User::get();
        return view('site.masters.user', compact('user'));
    }
}