<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

// Redirect the home page to the recipes list
Route::get('/', function () {
    return redirect('/recipes');
});

// Define your recipe routes
Route::get('/recipes',[RecipeController::class, 'index']);
Route::get('/recipes/{id}', [RecipeController::class, 'show']);