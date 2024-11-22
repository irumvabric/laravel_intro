<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlagController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');

    

    

});

Route::get('/dashboard', function () {
    return view('dashboard');


})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    


});


    
//states
Route::get('/state', [StateController::class, 'showStateHome'])->middleware('auth');
Route::get('/newstate', [StateController::class, 'showStateCreate']);
Route::get('/delstate{id}', [StateController::class, 'showStateDelete']);
Route::post('/postState', [StateController::class, 'createState']);
Route::get('/delstate/{id}', [StateController::class, 'deleteState']);
Route::get('/edstate/{id}', [StateController::class, 'updateState']);
Route::put('/edstate/{id}', [StateController::class, 'update']);
Route::get('/detstate/{id}', [StateController::class, 'showStateDetails']);


//flags
Route::get('/flag', [FlagController::class, 'showFlagHome']);
Route::get('/newflag', [FlagController::class, 'showFlagCreate']);
Route::get('/delflag/{id}', [FlagController::class, 'deleteFlag']);
Route::post('/postflag', [FlagController::class, 'createFlag']);
Route::get('/edflag/{id}', [FlagController::class, 'updateFlag']);
Route::put('/edflag/{id}', [FlagController::class, 'update']);


require __DIR__.'/auth.php';
