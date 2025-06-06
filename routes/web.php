<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\TicketController;



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

    // Route สำหรับจัดการข้อมูลเที่ยวบิน
    Route::get('/flights', [FlightController::class, 'index'])->name('flights.index');
    Route::get('/flights/create', [FlightController::class, 'create'])->name('flights.create');
    Route::post('/flights', [FlightController::class, 'store'])->name('flights.store');
    Route::get('/flights/{flight}', [FlightController::class, 'show'])->name('flights.show');
    Route::get('/flights/{flight}/edit', [FlightController::class, 'edit'])->name('flights.edit');
    Route::put('/flights/{flight}', [FlightController::class, 'update'])->name('flights.update');
    Route::delete('/flights/{flight}', [FlightController::class, 'destroy'])->name('flights.destroy');

    // Route สำหรับจัดการข้อมูลตั๋ว
    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
    Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
    Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('tickets.edit');
    Route::put('/tickets/{ticket}', [TicketController::class, 'update'])->name('tickets.update');
    Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');
    
    // เมื่อล็อกอินแล้วเข้าหน้า index ทันที
    Route::get('/dashboard', function () {
        return redirect()->route('index');
    });
});