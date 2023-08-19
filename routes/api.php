<?php

use App\Http\Controllers\Operation;
use App\Http\Controllers\Callback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateComplaint;
use App\Http\Controllers\API\CronJobController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('/operation', Operation::class);
Route::resource('/callback', Callback::class);
Route::post('/CreateComplaint', [CreateComplaint::class,'store']);
Route::post('/update-case', [CreateComplaint::class, 'update'])->name('update.case');
Route::get('/cron-job', [CronJobController::class, 'index'])->name('cron-job');

//Route::post('/operation/update-ticket', [Operation::class, 'ticketUpdate'])->name('operation.ticketUpdate');
//Route::resource('operation', App\Http\Controllers\Operation::class);
//Route::post('/index', [App\Http\Controllers\API\Operation::class, 'index']);
