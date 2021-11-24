<?php

use App\Http\Controllers\LeaguesController;
use App\Http\Controllers\ScoresController;
use App\Http\Controllers\TeamsController;
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
    Route::post('store', [LeaguesController::class , 'store'])->name('leagues.store');
    Route::get('delete/{id}', [LeaguesController::class , 'delete'])->name('leagues.delete');
    Route::get('create', [LeaguesController::class , 'create'])->name('leagues.create');

    Route::get('scores/{id}', [ScoresController::class , 'index'])->name('scores.index');
    Route::get('scores/{id}/teams', [ScoresController::class , 'start'])->name('scores.start');
    Route::get('scores/{id}/game', [ScoresController::class , 'game'])->name('scores.game');
//    Route::get('footballTeams/{id}/create', [ScoresController::class , 'create'])->name('footballTeams.create');
//    Route::post('footballTeams/{id}/store', [ScoresController::class , 'store'])->name('footballTeams.store');

    Route::get('footballTeams/{id}', [TeamsController::class , 'index'])->name('footballTeams.index');
    Route::get('footballTeams/{id}/create', [TeamsController::class , 'create'])->name('footballTeams.create');
    Route::post('footballTeams/{id}/store', [TeamsController::class , 'store'])->name('footballTeams.store');

});
