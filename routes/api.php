<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

use App\Models\Pitchers;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/pbd', [GameController::class, 'pitchBat']);
Route::get('/fix',   function () {
Pitchers::where('id', 4)->update(["name" => "Hayden Cooper"]);
    
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
