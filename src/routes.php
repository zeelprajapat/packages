<?php
use Illuminate\Support\Facades\Route;
use ComminicationCraft\Pagemanagement\PageManagementController;

// Route::get('page', function(){
// 	echo 'Hello from the page Management package!';
// });

Route::middleware(['web'])->group(function () {
Route::resource('page', PageManagementController::class);

});