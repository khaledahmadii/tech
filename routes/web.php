<?php

use Illuminate\Support\Facades\Route;
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/auth', [App\Http\Controllers\UserAuth::class, 'login'])->name('auth');
Route::get('/dash', [App\Http\Controllers\dash::class, 'index'])->name('dash');

    Route::get('/tech', [App\Http\Controllers\interv::class, 'getAll']);
    Route::get('/tech/{id}', [App\Http\Controllers\interv::class, 'parmoistech']);
    Route::get('/ptech/{id}', [App\Http\Controllers\interv::class, 'getpartech']);
    Route::get('/interv', [App\Http\Controllers\interv::class, 'getAll'])->name('intervention');
    Route::post('/addinterv', [App\Http\Controllers\interv::class, 'ajouter']);
    Route::post('/interv/add', [App\Http\Controllers\interv::class, 'ajouter'])->name('intervention.add');
    Route::post('/interv/update', [App\Http\Controllers\interv::class, 'update'])->name('intervention.update');
    Route::get('/interv/del/{id}', [App\Http\Controllers\interv::class, 'supprimer'])->name('intervention.delete');
    Route::get('/logout', [App\Http\Controllers\UserAuth::class, 'logout'])->name('logout');
    Route::get('/', [App\Http\Controllers\interv::class, 'getAll'])->name('dash');
    Route::get('/compte', [App\Http\Controllers\ProfileController::class, 'index'])->name('compte');
    Route::get('/compte/delete/{id}', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('compte.delete');
    Route::post('/compte/add', [App\Http\Controllers\ProfileController::class, 'create'])->name('compte.add');
    Route::post('/compte/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('compte.update');
    Route::post('/compte/update-password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('compte.updatePassword');
    Route::get('/tarif', [App\Http\Controllers\TarifController::class, 'index'])->name('tarif');
    Route::post('/tarif/update', [App\Http\Controllers\TarifController::class, 'update'])->name('tarif.update');
    Route::post('/tarif/add', [App\Http\Controllers\TarifController::class, 'create'])->name('tarif.add');
    Route::get('/tarif/delete/{id}', [App\Http\Controllers\TarifController::class, 'destroy'])->name('tarif.delete');
    Route::get('/racc', [App\Http\Controllers\Raccordement::class, 'index'])->name('racc.index');
    Route::post('/racc/add', [App\Http\Controllers\Raccordement::class, 'create'])->name('racc.add');
    Route::post('/racc/update', [App\Http\Controllers\Raccordement::class, 'update'])->name('racc.update');
    Route::get('/racc/delete/{id}', [App\Http\Controllers\Raccordement::class, 'destroy'])->name('racc.delete');