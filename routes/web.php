<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GroupAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasterAdminController;
use App\Http\Controllers\SiteAdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->to('home');
});

Route::get('/master-admin', [MasterAdminController::class, 'index'])->name('masterAdmin.dashboard')->middleware('masteradmin');
Route::get('/group-admin', [GroupAdminController::class, 'index'])->name('groupAdmin.dashboard')->middleware('groupadmin');
Route::get('/site-admin', [SiteAdminController::class, 'index'])->name('siteAdmin.dashboard')->middleware('siteadmin');

Auth::routes();
Route::get('logout', [LoginController::class, 'logout']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
