<?php

use App\Http\Controllers\ComputerController;
use App\Http\Controllers\IssueController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('computers', ComputerController::class);

Route::resource('issues', IssueController::class)->except(['index']);
Route::get('/', [IssueController::class, 'index'])->name('issues.index');
