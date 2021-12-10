<?php
use Illuminate\Support\Facades\Route;
use ComminicationCraft\Pagemanagement\PageManagementController;


Route::middleware(['web'])->group(function () {
Route::resource('page', PageManagementController::class);

});