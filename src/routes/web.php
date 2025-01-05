<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

//register画面→admin画面
Route::middleware('auth')->group(function(){
    Route::GET('/admin', [ContactController::class, 'adminIndex']);
});

//contact関連画面
Route::GET('/', [ContactController::class, 'contactIndex']);
Route::POST('/confirm', [ContactController::class, 'confirm']);
Route::POST('/thanks', [ContactController::class, 'store']);
Route::POST('/', [ContactController::class, 'edit']);

//Admin関連画面
Route::POST('/admin/search', [ContactController::class, 'search']);
Route::POST('/contactExport', [ContactController::class, 'contactExport']);
Route::POST('/logout', [ContactController::class, 'logout']);