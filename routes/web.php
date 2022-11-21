<?php

use App\Http\Controllers\InviteController;
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

Route::get('/', function () {
    return "<h3>cette page n'existe pas </h3>";
});

Route::resources([
    'invite'=>InviteController::class,
]);


Route::get('/check/{code}',[InviteController::class,'check'])->name('check');
Route::post('/importer',[InviteController::class,'import'])->name('inviter.import');
Route::get('/charger-list',[InviteController::class,'import_form'])->name('inviter.import-form');
