<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\Admin\DashboardController;
// Beri nama panggilan khusus untuk CourseController milik Admin
use App\Http\Controllers\Admin\CourseController as AdminCourseController; 
use App\Http\Controllers\Admin\LessonController as AdminLessonController;
use Illuminate\Support\Facades\Route;

// ==========================================
// 1. RUTE PUBLIK (MAHASISWA)
// ==========================================

// Landing Page Pemasaran (Wajah Utama DevAcademy)
Route::get('/', function () {
    return view('landing');
})->name('landing');

// Katalog Kelas dipindah ke /katalog (Tetap menggunakan nama rute 'home')
Route::get('/katalog', [HomeController::class, 'index'])->name('home');

// Rute Detail Materi Kelas
Route::get('/course/{slug}', [CourseController::class, 'show'])->name('course.show');

// Rute untuk membaca isi materi
Route::get('/course/{course_slug}/lesson/{lesson_slug}', [LessonController::class, 'show'])->name('lesson.show');

// ... (Sisa kode di bawahnya biarkan sama persis) ...

// ==========================================
// 2. RUTE MAHASISWA LOGIN (BAWAAN BREEZE & FITUR KITA)
// ==========================================

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Rute untuk menandai materi selesai (Sudah aman di dalam grup auth)
    Route::post('/course/{course_slug}/lesson/{lesson_slug}/complete', [LessonController::class, 'markAsComplete'])->name('lesson.complete');
});

// ==========================================
// 3. RUTE KHUSUS ADMIN
// ==========================================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard Admin
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Rute CRUD untuk Manajemen Kelas (Menggunakan nama alias)
    Route::resource('courses', AdminCourseController::class);
    
    // Rute CRUD untuk Manajemen Materi (Bersarang di dalam Kelas)
Route::resource('courses.lessons', AdminLessonController::class);
});

// Wajib diletakkan di paling bawah dan cukup SATU kali saja
require __DIR__.'/auth.php';