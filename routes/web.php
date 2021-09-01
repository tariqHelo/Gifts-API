<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;


use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;

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
