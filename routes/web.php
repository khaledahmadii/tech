<?php

use Illuminate\Support\Facades\Route;
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/auth', [App\Http\Controllers\UserAuth::class, 'login'])->name('auth');
Route::get('/test', function () {
    dd([
        'auth_check' => Auth::check(),
        'user' => Auth::user(),
        'session_id' => session()->getId(),
        'session_data' => session()->all(),
        'cookie' => request()->cookie(session()->getName())
    ]);
})->middleware('web');
Route::middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\dash::class, 'index'])->name('index');
    Route::get('/tech', [App\Http\Controllers\interv::class, 'getAll']);
    Route::get('/tech/{id}', [App\Http\Controllers\interv::class, 'parmoistech']);
    Route::get('/ptech/{id}', [App\Http\Controllers\interv::class, 'getpartech']);
    Route::post('/addinterv', [App\Http\Controllers\interv::class, 'ajouter']);
    Route::get('/interv/del/{id}', [App\Http\Controllers\interv::class, 'supprimer']);
    Route::get('/logout', [App\Http\Controllers\UserAuth::class, 'logout'])->name('logout');
});