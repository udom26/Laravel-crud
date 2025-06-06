<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;



// หน้าแรก (welcome) สำหรับผู้ที่ยังไม่ล็อกอิน
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// กลุ่ม route ที่ต้องล็อกอินเท่านั้น
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/index', [PostController::class, 'index'])->name('index');
    Route::get('/create', [PostController::class, 'create'])->name('create');
    Route::post('/store', [PostController::class, 'store'])->name('store');
    Route::get('/show/{post}', [PostController::class, 'show'])->name('show');
    Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit');
    Route::put('/update/{post}', [PostController::class, 'update'])->name('update');
    Route::delete('/destroy/{post}', [PostController::class, 'destroy'])->name('destroy');
    Route::get('/books', [PostController::class, 'table'])->name('books');
    
    // เมื่อล็อกอินแล้วเข้าหน้า index ทันที
    Route::get('/dashboard', function () {
        return redirect()->route('index');
    });
});