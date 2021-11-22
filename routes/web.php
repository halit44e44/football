<?php

use App\Http\Controllers\LeaguesController;
use App\Http\Controllers\ScoresController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['middlaware' => 'auth'], function(){

    Route::get('/', [LeaguesController::class , 'index'])->name('leagues.index');
    Route::get('footballTeams/{id}', [ScoresController::class , 'index'])->name('footballTeams.index');

});
