<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    PermissionsController,
    RolesController,
    UsersController
};
use App\Http\Controllers\{
    CategoriesController,
    ProductController,
    PersonalizationController,
    BrandsController,
    ProductDetailsController
};


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
Route::post('/barcode', [ProductDetailsController::class , 'barcode'])->name('barcode');

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
// $(document).on("scanButtonDown", "document", function(e) {
// // get scanned content
// var scannedProductId = this.getScannedContent();

// // get product
// var product = getProductById(scannedProductId);

// // add productname to list
// $("#product_list").append("<li>" + product.name + "</li>");
// });

// var barcode = [];
// var interval;
// document.addEventListener('keydown', function(evt) {
// if (interval)
// clearInterval(interval);
// if (evt.code == 'Enter') {
// if (barcode)
// handleBarcode(barcode);
// barcode = [];
// return;
// }
// if (evt.key != 'Shift')
// barcode += evt.key;
// interval = setInterval(() => barcode = '', 20);
// });

// function handleBarcode(scanned_barcode) {
// document.querySelector('#last-barcode').innerHTML = scanned_barcode;
// }


// $(document).on("barcode", "document", function(e) {
// // get scanned content
// var scannedProductId = this.getScannedContent();

// console.log(scannedProductId);
// // get barcode
// var product = getBarcodeById(scannedProductId);

// // add barcodename to list
// $("#product_list").append("<li>" + product.name + "</li>");
// });
