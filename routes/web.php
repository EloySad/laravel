<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('users.index'); // Redirige al listado de usuarios
});


Route::resource('users', UsersController::class);

