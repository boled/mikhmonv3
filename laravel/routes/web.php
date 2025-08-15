<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RadiusController;

Route::get('/radius', [RadiusController::class, 'index']);
