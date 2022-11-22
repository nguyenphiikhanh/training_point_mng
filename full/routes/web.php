<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\FacultController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dang-nhap', [LoginController::class,'index'])->name('login.index');
Route::post('/dang-nhap', [LoginController::class,'login'])->name('login.login_post');
Route::get('logout', [LoginController::class,'logout'])->name('logout');

Route::middleware('user.authenticated')->prefix('')->name('page.')->group(function () {
    Route::get('/',[DashBoardController::class,'index'])->name('index');

    //BEGIN: quản lí khoa. Role: ADMIN
    Route::get('/quan-li-khoa',[FacultController::class,'index'])->name('faculty.list');
    Route::post('/quan-li-khoa',[FacultController::class,'store'])->name('faculty.store');
    Route::post('/quan-li-khoa/{id}/update',[FacultController::class,'update'])->name('faculty.update');
    Route::get('/quan-li-khoa/{id}/delete',[FacultController::class,'destroy'])->name('faculty.destroy');
    //END: quản lí khoa.

    //BEGIN: quản lí lớp. ROLE: Cán bộ khoa
    Route::get('/quan-li-lop',[ClassController::class,'index'])->name('class.list');
    //END: quản lí khoa.

});
