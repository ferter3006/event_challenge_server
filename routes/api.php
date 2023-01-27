<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\InscritosController;
use App\Http\Controllers\UserController;
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

Route::get('/pene', function(){
    dd("hola");
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/s3tup', [UserController::class, 'setup']);

Route::post('/login', [UserController::class, 'loginUser']);
Route::post('/create_user', [UserController::class, 'createUser']);

Route::middleware(['auth:sanctum'])->group(function () {    
    
    Route::get('/index_users', [UserController::class, 'indexUsers']);

    Route::post('/create_event', [EventController::class, 'createEvent']);
    Route::post('/edit_event/{id}', [EventController::class, 'editEvent']);
    Route::get('/index_all_events', [EventController::class, 'indexAllEvents']);
    Route::post('/delete_event', [EventController::class, 'deleteEvent']);

    Route::post('/inscrive', [InscritosController::class, 'inscrive']);


});