<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;


use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\PersonalizationController;
use App\Http\Controllers\BrandsController;

use App\Http\Controllers\ProductDetailsController;

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


Route::get('/', function () {
    return view('layouts.admin');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::post('/image', [ProductDetailsController::class , 'image'])->name('image');

/* Start Admin Route */
// Permissions
Route::resource('permissions', PermissionsController::class);
// Roles
Route::resource('roles', RolesController::class);
// Users
Route::resource('users', UsersController::class);
/* End Admin Route */

 Route::resource('/categories', CategoriesController::class);
 Route::get('categories/delete/{id}', [CategoriesController::class , 'destroy'])->name('category.delete');

 Route::resource('/products', ProductController::class);

 Route::resource('/brands', BrandsController::class);
 Route::get('brands/delete/{id}', [BrandsController::class , 'destroy'])->name('brands.delete');

 Route::resource('/personalizations', PersonalizationController::class);
 Route::get('personalizations/delete/{id}', [PersonalizationController::class ,'destroy'])->name('personalizations.delete');

 Route::resource('/product_details', ProductDetailsController::class);
