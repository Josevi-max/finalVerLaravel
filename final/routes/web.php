<?php

use App\Http\Controllers\AddValoration;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\ControlUsersAdmin;
use Illuminate\Support\Facades\Route;

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

Route::get("/", function () {
    return view("components/main");
});
Route::get('dashboard/admin', [ControlUsersAdmin::class,"admin"])->middleware(['auth:sanctum', 'verified',"role:Admin"])->name('dashboard.admin');



Route::middleware(['auth:sanctum', 'verified', "role:Student"])->get('/dashboard', function () {

    return view('dashboard');
})->name('dashboard');

Route::resource('buy', BuyController::class)->only(["create", "store"])->middleware(['auth:sanctum', 'verified',"role:Student"]);
Route::resource('valoration', AddValoration::class)->only(["create", "store"])->middleware(['auth:sanctum', 'verified',"role:Admin"]);

Route::get("/profile", function () {
    return view("profile/show");
})->middleware(['auth:sanctum', 'verified']);
