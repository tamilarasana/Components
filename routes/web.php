<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\Admin\CardController;
use App\Http\Controllers\Webpage\WebController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ResourceController;
use App\Http\Controllers\Admin\CategorytypeController;
use App\Http\Controllers\Webpage\Components\WebviewController;
use App\Http\Controllers\Superadmin\SuperadminCategoryController;
use App\Http\Controllers\Superadmin\SuperadminResourceController;
use App\Http\Controllers\Superadmin\SuperadminCategorytypeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/login', function () {
//     return view('welcome');
// });


Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::get('/', [WebController::class, 'index']);

Route::middleware(['user'])->group(function () {
   
});

Route::get('/admin', function () {
    return view('auth.login');
});

Route::middleware(['admin'])->group(function () {

    Route::get('/showcomponents/{id}', [WebController::class, 'showComponents'])->name('showcomponents');
    Route::get('/resourceshow/{id}', [WebController::class, 'resourceShow'])->name('resourceshow');
    Route::get('search', [WebController::class,'search'])->name('search');
    Route::get('getData/{id?}', [WebController::class,'getdata'])->name('show.data');
    Route::get('component/{name?}', [WebController::class,'getComponent'])->name('component');
    Route::get('resource/{name?}', [WebController::class,'getResources'])->name('resources');
    
    Route::resource('categories', CategoryController::class);
    Route::resource('categorytype', CategorytypeController::class);
    Route::resource('resources', ResourceController::class);
});

Route::middleware(['superadmin'])->group(function () {
    Route::resource('superadmincategories', SuperadminCategoryController::class);
    Route::resource('superadmincategorytype', SuperadminCategorytypeController::class);
    Route::resource('superadminresources', SuperadminResourceController::class);
    Route::get('userChangeStatus/{id?}',[SuperadminCategorytypeController::class,'StatusChange'])->name('userChangeStatus');
    Route::get('changeResourceStatus/{id?}',[SuperadminResourceController::class,'StatusChange'])->name('changeResourceStatus');
    Route::get('changeCategoryStatus/{id?}',[SuperadminCategoryController::class,'StatusChange'])->name('changeCategoryStatus');
});



