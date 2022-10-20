<?php

use App\Http\Controllers\ContactInfoController;
use App\Http\Controllers\HomeController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ContactInfoController::class)->group(function () {
    Route::get('/getAllContactInfo', 'getAllContactInfo');
    Route::post('/createContactInfo', 'createContactInfo');
    Route::put('/updateContactInfo', 'updateContactInfo');
    Route::delete('/deleteContactInfo', 'deleteContactInfo');

});

