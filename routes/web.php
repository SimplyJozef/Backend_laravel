<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PovedaliONnasController;
use App\Http\Controllers\SpeakersController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\StageInfoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});




Route::get('/adminrozhranie', [AdminController::class, 'test']);

Route::delete('/delete-stage/{id}', [StageController::class, 'deleteStage'])->name("delete-stage");



Route::put('/update-stageInfo/{id}', [StageInfoController::class, 'updateStageInfo'])->name("update-stageInfo");

Route::get('/adminrozhranie', [AdminController::class, 'showAdminRozhranie'])->name("adminrozhranie");

Route::put('/sponsors/{id}', [SponsorController::class, 'updateSponzor'])->name('update-sponsor');
Route::delete('/sponsors/{id}', [SponsorController::class, 'deleteSponzor'])->name('delete-sponsor');
Route::post('/sponsors', [SponsorController::class, 'createSponzor'])->name('create-sponsor');

Route::put('/speakers/{id}', [SpeakersController::class, 'updateSpeaker'])->name('update-speaker');
Route::delete('/speakers/{id}', [SpeakersController::class, 'deleteSpeaker'])->name('delete-speaker');
Route::post('/speakers', [SpeakersController::class, 'createSpeaker'])->name('create-speaker');

Route::put('/povedaliONas/{id}', [PovedaliONnasController::class, 'updatePovedaliONas'])->name('update-povedaliONas');
Route::delete('/povedaliONas/{id}', [PovedaliONnasController::class, 'deletePovedaliONas'])->name('delete-povedaliONas');
Route::post('/povedaliONas', [PovedaliONnasController::class, 'createPovedaliONas'])->name('create-povedaliONas');
