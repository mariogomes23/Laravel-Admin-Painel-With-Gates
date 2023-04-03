<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(["auth","role:admin"])->prefix("admin")->group(function(){

    Route::get('/',[AdminController::class,"index"])->middleware(["auth","role:admin"])->name("admin.index");
    Route::resource("roles",RoleController::class)->names([
        'index'=>'role.index',
        'edit'=>'role.edit',
        'create'=>'role.create',
        'show'=>'role.show',
        'destroy'=>'role.destroy',
        'store'=>'role.store',
        'update'=>'role.update',

    ]);


});
require __DIR__.'/auth.php';
