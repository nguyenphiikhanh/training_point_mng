<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\FacultController;
use App\Http\Controllers\KhoaDaoTaoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\UserController;
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

    Route::get('/doi-mat-khau',[UserController::class,'password_change_view'])->name('password.change.view');
    Route::post('/doi-mat-khau',[UserController::class,'password_change'])->name('password.change.store');

    // ADMIN
    Route::middleware('role.admin')->group(function(){
    // Quản lý Khoa
    Route::get('/khoa',[FacultController::class,'index'])->name('faculty.list');
    Route::post('/khoa',[FacultController::class,'store'])->name('faculty.store');
    Route::post('/khoa/{id}/update',[FacultController::class,'update'])->name('faculty.update');
    Route::get('/khoa/{id}/delete',[FacultController::class,'destroy'])->name('faculty.destroy');
    //

    // quản lí đợt xét duyệt
    Route::get('/xet-duyet-mng',[ApprovalController::class,'index'])->name('time.list');
    Route::post('/xet-duyet-mng',[ApprovalController::class,'store'])->name('time.store');
    Route::post('/xet-duyet-mng/{id}/update',[ApprovalController::class,'update'])->name('time.update');
    Route::get('/xet-duyet-mng/{id}/delete',[ApprovalController::class,'delete'])->name('time.delete');

    // Quản lí người dùng
    Route::get('/nguoi-dung',[UserController::class,'index'])->name('user.index');
    Route::post('/nguoi-dung',[UserController::class,'store'])->name('user.store');
    Route::post('/nguoi-dung/{id}/update',[ApprovalController::class,'update'])->name('user.update');
    Route::get('/nguoi-dung/{id}/delete',[ApprovalController::class,'destroy'])->name('user.delete');

    // Quản lý khoá đào tạo
    Route::get('/khoa-dao-tao',[KhoaDaoTaoController::class,'index'])->name('khoaDaoTao.list');
    Route::post('/khoa-dao-tao',[KhoaDaoTaoController::class,'store'])->name('khoaDaoTao.store');
    Route::post('/khoa-dao-tao/{id}/update',[KhoaDaoTaoController::class,'update'])->name('khoaDaoTao.update');
    Route::get('/khoa-dao-tao/{id}/delete',[KhoaDaoTaoController::class,'destroy'])->name('khoaDaoTao.delete');
    });

    // QLSV
    // Lớp
    Route::get('/quan-li-lop',[ClassController::class,'index'])->name('class.list');

    // Quản lí sinh viên
    Route::get('/quan-li-lop/sinh-vien',[StudentController::class,'index'])->name('user.student');
});
