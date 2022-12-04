<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware('auth:sanctum')->group(function () {
    Route::get('contacts/finished',[App\Http\Controllers\Api\ContactController::class,'get_finished'])->name('contact.finished');
    Route::get('contacts/get-deleted',[App\Http\Controllers\Api\ContactController::class,'get_deleted'])->name('contact.get_deleted');
    Route::get('contacts/get/{phone}',[App\Http\Controllers\Api\ContactController::class,'get_by_number'])->name('contact.phone');
    Route::put('contacts/{contact}/finished',[App\Http\Controllers\Api\ContactController::class,'set_finished'])->name('contact.set_finished');
    Route::put('contacts/{contact}/restore',[App\Http\Controllers\Api\ContactController::class,'restore'])->name('contact.restore');
    Route::resource('contacts',App\Http\Controllers\Api\ContactController::class)->only('index','show','update','destroy');
});