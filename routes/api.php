<?php


use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PovedaliONnasController;
use App\Http\Controllers\SpeakersController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\StageInfoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/stage-info/{stage_id}', [StageInfoController::class, 'getStageInfo']);
Route::delete('/stage-info/{id}', [StageInfoController::class, 'deleteStageInfo']);
Route::post('/stage-info', [StageInfoController::class, 'createStageInfo']);
Route::put('/stage-info/{id}', [StageInfoController::class, 'updateStageInfo']);

Route::get('/stages', [StageController::class, 'getStages']);
Route::delete('/stages/{id}', [StageController::class, 'deleteStage']);
Route::post('/stages', [StageController::class, 'createStage']);
Route::put('/stages/{id}', [StageController::class, 'updateStage']);

Route::get('/sponsors', [SponsorController::class, 'getSponsors']);
Route::post('/sponsors', [SponsorController::class, 'createSponzor']);
Route::delete('/sponsors/{id}', [SponsorController::class, 'deleteSponzor']);
Route::put('/sponsors/{id}', [SponsorController::class, 'updateSponzor']);

Route::post('/speakers', [SpeakersController::class, 'createSpeaker']);
Route::delete('/speakers/{id}', [SpeakersController::class, 'deleteSpeaker']);
Route::put('/speakers/{id}', [SpeakersController::class, 'updateSpeaker']);
Route::get('/speakers', [SpeakersController::class, 'getSpeakers']);

Route::post('/galleries', [GalleryController::class, 'createGallery']);
Route::delete('/galleries/{id}', [GalleryController::class, 'deleteGallery']);
Route::put('/galleries/{id}', [GalleryController::class, 'updateGallery']);
Route::get('/galleries', [GalleryController::class, 'getGalleries']);

Route::post('/povedalionas', [PovedaliONnasController::class, 'createPovedaliONas']);
Route::delete('/povedalionas/{id}', [PovedaliONnasController::class, 'deletePovedaliONas']);
Route::put('/povedalionas/{id}', [PovedaliONnasController::class, 'updatePovedaliONas']);
Route::get('/povedalionas', [PovedaliONnasController::class, 'getPovedaliONas']);



Route::put('/stage-info/{id}', [StageInfoController::class, 'update']);
