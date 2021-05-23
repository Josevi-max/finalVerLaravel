<?php

use App\Http\Controllers\AddValoration;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ControlUsersAdmin;
use App\Http\Controllers\updateInfoUser;
use App\Http\Controllers\valorationStudent;
use App\Http\Middleware\noAdmin;
use App\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;
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
Route::get('dashboard/admin/{searchs?}', [ControlUsersAdmin::class,"admin"])->middleware(['auth:sanctum', 'verified',"role:Admin"])->name('dashboard.admin');

Route::post('dashboard/search', [ControlUsersAdmin::class,"search"])->middleware(['auth:sanctum', 'verified',"role:Admin"])->name('dashboard.search');


Route::middleware(['auth:sanctum', 'verified', "role:Student"])->get('/dashboard', function () {

    return view('dashboard');
})->name('dashboard');

Route::resource('buy', BuyController::class)->only(["create", "store"])->middleware(['auth:sanctum', 'verified',"role:Student"]);
Route::resource('valoration', AddValoration::class)->only(["create", "store"])->middleware(['auth:sanctum', 'verified',"role:Admin"]);


Route::resource('profile', updateInfoUser::class)->only(["edit", "update","destroy"])->middleware(['auth:sanctum', 'verified']);

Route::resource('contact', ContactController::class);

Route::resource('evaluation', valorationStudent::class)->only(["index"])->middleware(['auth:sanctum', 'verified',"role:Student"]);


