<?php

use App\Http\Controllers\ProfileController;
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

Route::group(['middleware'=>['auth']],function (){
    Route::get('/',[\App\Http\Controllers\MainController::class,'main'] )->name('main');
    Route::resource('applications',\App\Http\Controllers\ApplicationController::class);

    Route::get('applications/{application}/answer',[\App\Http\Controllers\AnswerController::class,'create'])->name('answer.create');
    Route::post('applications/{application}/answer',[\App\Http\Controllers\AnswerController::class,'store'])->name('answer.store');
});



Route::get('/dashboard', [\App\Http\Controllers\MainController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
