<?php

use App\Http\Controllers\BuyController;
use App\View\Components\index;


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
base_path("");
Route::get("/", function () {
    return view("components/main");
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::resource('buy', BuyController::class)->only(["create","store"])->middleware(['auth:sanctum', 'verified']);