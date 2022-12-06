<?php

use App\Http\Controllers\InviteController;
use App\Http\Controllers\TableController;
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
    'table'=>TableController::class,
]);


Route::get('/check/{code}',[InviteController::class,'check'])->name('check');
Route::post('/importer',[InviteController::class,'import'])->name('invite.import');
Route::get('/charger-list',[InviteController::class,'import_form'])->name('invite.import-form');
Route::get('/add-to-table-frm',[InviteController::class,'add_to_table_frm'])->name('invite.add_to_table_frm');
Route::post('/add-to-table',[InviteController::class,'save_add_to_table'])->name('invite.save-add-to-table');
Route::get('/remove-to-table/{invite}',[InviteController::class,'remove'])->name('invite.remove-to-table');

Route::get('/prt/{id}', [InviteController::class, 'createPDF'])->name('print');
Route::get('/prt_all', [InviteController::class, 'createAllPDF'])->name('print-all');
