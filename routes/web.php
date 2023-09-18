<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\GroupAdminController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasterAdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteAdminController;

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/optimize', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return redirect()->back()->with('success', 'Cache Cleared SuccessFully');
});

/************************************************
 *  Login  Route
 ************************************************/
Route::get('/', function () {
    return redirect()->to('home');
});
Route::post('/check-user-detail', [LoginController::class, 'validateDetails']);
Auth::routes();
Route::get('logout', [LoginController::class, 'logout']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.overview');

/************************************************
 *  Matser - Admin Route
 ************************************************/

Route::get('/master-admin', [MasterAdminController::class, 'index'])->name('masterAdmin.dashboard')->middleware('masteradmin');



/************************************************
 *  Group - Admin Route
 ************************************************/

Route::get('/group-admin', [GroupAdminController::class, 'index'])->name('groupAdmin.dashboard')->middleware('groupadmin');

/*************************************************** REGION ROUTES ***************************************************/

Route::get('/region', [RegionController::class, 'getRegion'])->name('region');
Route::post('/change_region_status/{id}', [RegionController::class, 'changeStatus'])->name('change.region.status');
/*************************************************** COUNTRY ROUTES ***************************************************/

Route::get('/country', [CountryController::class, 'getCountries'])->name('country');
Route::post('/change_country_status/{id}', [CountryController::class, 'changeStatus'])->name('change.country.status');


/*************************************************** BRANCHES ROUTES ***************************************************/

Route::get('/branch', [BranchController::class, 'getBranch'])->name('branch');
Route::get('/get_country_data', [BranchController::class, 'getCountryData']);
Route::post('/add-branch', [BranchController::class, 'addBranchData']);
Route::post('/change_branch_status/{id}', [BranchController::class, 'changeStatus'])->name('change.branch.status');
Route::post('/edit_branch_data', [BranchController::class, 'editBranch'])->name('edit.branch.data');
Route::post('/edit-branch', [BranchController::class, 'editBranchData']);

/*************************************************** DEPARTMENT ROUTES ***************************************************/

Route::get('/department', [DepartmentController::class, 'getDepartment'])->name('department');
Route::post('/add-department', [DepartmentController::class, 'addDepartmentData']);
Route::post('/change_department_status/{id}', [DepartmentController::class, 'changeStatus'])->name('change.Department.status');
Route::post('/edit_department_data', [DepartmentController::class, 'editDepartment'])->name('edit.Department.data');
Route::post('/edit-department', [DepartmentController::class, 'editDepartmentData']);


/*************************************************** USER ROUTES ***************************************************/

Route::get('/user', [UserController::class, 'getUsers'])->name('user');

/************************************************
 *  Site - Admin Route
 ************************************************/

Route::get('/site-admin', [SiteAdminController::class, 'index'])->name('siteAdmin.dashboard')->middleware('siteadmin');