<?php

use Illuminate\Support\Facades\Route;
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/auth', [App\Http\Controllers\UserAuth::class, 'login'])->name('auth');


    Route::get('/tech', [App\Http\Controllers\interv::class, 'getAll']);
    Route::get('/tech/{id}', [App\Http\Controllers\interv::class, 'parmoistech']);
    Route::get('/ptech/{id}', [App\Http\Controllers\interv::class, 'getpartech']);
    Route::post('/addinterv', [App\Http\Controllers\interv::class, 'ajouter']);
    Route::post('/interv/add', [App\Http\Controllers\interv::class, 'ajouter'])->name('intervention.add');
    Route::post('/interv/update', [App\Http\Controllers\interv::class, 'update'])->name('intervention.update');
    Route::get('/interv/del/{id}', [App\Http\Controllers\interv::class, 'supprimer'])->name('intervention.delete');
    Route::get('/logout', [App\Http\Controllers\UserAuth::class, 'logout'])->name('logout');
    Route::get('/', [App\Http\Controllers\interv::class, 'getAll'])->name('dash');
    Route::get('/compte', [App\Http\Controllers\ProfileController::class, 'index'])->name('compte');
    Route::get('/compte/delete/{id}', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('compte.delete');