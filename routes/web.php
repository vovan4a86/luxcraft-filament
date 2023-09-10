<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])
    ->name('main');

Route::any('catalog', [CatalogController::class, 'index'])->name('catalog');
Route::any('catalog/{alias}', [CatalogController::class, 'view'])
    ->where('alias', '([A-Za-z0-9\-\/_]+)')
    ->name('catalog.view');

Route::any('manufacturer/{alias}', [CatalogController::class, 'manufacturer'])
    ->where('alias', '([A-Za-z0-9\-\/_]+)')
    ->name('catalog.manufacturer');

Route::get('policy', [PageController::class, 'policy'])
    ->name('policy');

Route::any('{alias}', [PageController::class, 'page'])
    ->where('alias', '([A-Za-z0-9\-\/_]+)')
    ->name('default');
