<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AccessUser as Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\DashboardController;
use App\Models\KriteriaModel;

// use App\Http\Middleware\;

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
Route::get('/input-responden', [AlternatifController::class,'InputResponden'])->name('InputResponden');
Route::post('/guest-insert',[AlternatifController::class,'GuestInsert'])->name('GuessInsert');

Route::get('/', function () {
    return view('Auth/Login');
})->name('Login');

Route::get('/verif-responden', function () {
    return view('Auth/LoginResponden');
})->name('VerifResponden');
Route::post('/responden-verify',[AlternatifController::class,'VerifyResponden'])->name('VerifyResponden');
Route::post('/guest-update',[AlternatifController::class,'GuessUpdate'])->name('GuessUpdate');

Route::get('/LupaPassword',function(){
    return view('Auth/LupaPassword');
})->name('LupaPassword');

Route::get('/404-not-found',function(){
    return view('not-found');
})->name('not-found');

Route::get('/logout', [AuthController::class,'Logout'])->name('Logout');

Route::post('/LoginProcess',[AuthController::class,'LoginProcess'])->name('LoginProcess');
Route::post('/ResetPassword',[AuthController::class,'ResetPassword'])->name('ResetPassword');

Route::middleware([Auth::class])->group(function(){
    Route::get('/Dashboard',[DashboardController::class,'Dashboard'])->name('Dashboard');
    // Kriteria
    Route::get('/Kriteria',[KriteriaController::class,'Index'])->name('KriteriaIndex');
    Route::post('/Kriteria-update',[KriteriaController::class,'Update'])->name('KriteriaUpdate');

    // subKriteria
    Route::get('/sub-kriteria',[KriteriaController::class,'SubKriteriaIndex'])->name('SubKriteriaIndex');
    Route::get('/sub-kriteria-bobot',[KriteriaController::class,'UpdateBobot'])->name('UpdateBobot');
    Route::post('/sub-kriteria-update',[KriteriaController::class,'SubKriteriaUpdate'])->name('SubKriteriaUpdate');

    // BobotKriteria
    Route::get('/alternatif',[AlternatifController::class,'Index'])->name('AlternatifIndex');
    Route::post('/alternatif-update',[AlternatifController::class,'Update'])->name('AlternatifUpdate');

    //Reponden
    Route::get('/responden',[AlternatifController::class,'Reponden'])->name('RespondenIndex');
    Route::get('/responden-input',[AlternatifController::class,'RespondenInput'])->name('RespondenInput');
    Route::get('/responden-edit/{id}',[AlternatifController::class,'RespondenEdit'])->name('RespondenEdit');
    Route::post('/responden-update',[AlternatifController::class,'RespondenUpdate'])->name('RespondenUpdate');
    Route::post('/responden-insert',[AlternatifController::class,'RespondenInsert'])->name('RespondenInsert');
    Route::post('/responden-update',[AlternatifController::class,'RespondenUpdate'])->name('RespondenUpdate');
    Route::get('/responden-delete/{id}',[AlternatifController::class,'RespondenDelete'])->name('RespondenDelete');
    Route::get('/responden-input-batch',function(){
        return view('Alternatif.InputBatch');
    })->name('InputBatch');
    Route::post('/responden-insert-batch',[AlternatifController::class,'InsertBatch'])->name('InsertBatch');
    Route::get('/responden-delete-batch',[AlternatifController::class,'DeleteBatch'])->name('DeletaBatch');

    //Reponden Guess
    Route::get('/responden-guest',[AlternatifController::class,'GuessResponden'])->name('RespondenGuess');
    Route::get('/responden-guest/{id}',[AlternatifController::class,'GuessRespondenView'])->name('RespondenGuessView');


    Route::get('/saw-frekuensi',[AlternatifController::class,'SAWFrekuensi'])->name("FrekuensiSAW");
    Route::get('/saw-kecocokan-matriks',[AlternatifController::class,'SAWKecocokan'])->name('KecocokanSAW');
    Route::get('/saw-normalisasi-matriks',[AlternatifController::class,'SAWNormalisasi'])->name('NormalisasiSAW');
    Route::get('/saw-update-bobot',[AlternatifController::class,'SAWUpdateBobot'])->name('UpdateBobotSAW');

    Route::get('/topsis-matriks-terbobot',[AlternatifController::class,'TOPSISTerbobot'])->name('TOPSISTerbobot');
    Route::get('/topsis-solusi-ideal',[AlternatifController::class,'TOPSISSolusiIDeal'])->name('TOPSISIdeal');
    Route::get('/topsis-preferensi',[AlternatifController::class,'TOPSISPreferensi'])->name('TOPSISPreferensi');

});







