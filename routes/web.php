<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShedController;
use App\Models\Shed;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
return view('welcome');
});

Auth::routes ();

Route::resource('sheds', ShedController::class);