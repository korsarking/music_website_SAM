<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\SearchController;

Route::get('/search', [SearchController::class, "index"]);
