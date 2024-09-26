<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HewanController;

Route::get('/user', [UserController::class, 'listuser']);
Route::get('/adduser', [UserController::class, 'adduser']);
Route::get('/simpan_user', [UserController::class, 'simpan_user']);
Route::get('/showUser', [UserController::class, 'showUser']);
Route::get('/deleteuser', [UserController::class, 'delete_user']);

Route::get('/update_user', [UserController::class, 'update_user']);

// edit
Route::get('/edit_user', [UserController::class, 'edit_user']);


Route::get('/hewan', [HewanController::class, 'listhewan']);
Route::get('/showHewan', [HewanController::class, 'showHewan']);
Route::get('/addhewan', [HewanController::class, 'addhewan']);
Route::get('/simpan_hewan', [HewanController::class, 'simpan_hewan']);
Route::get('/deletehewan', [HewanController::class, 'deletehewan']);

Route::get('/edithewan', [HewanController::class, 'edithewan']);
Route::get('/updatehewan', [HewanController::class,'updatehewan']);




