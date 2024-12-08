<?php

use App\Http\Controllers\ExampleController;
use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\PostController;
 Route::get('/', [ExampleController::class, "index"]);
 Route::get("posts", [PostController::class, "index"]);