<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <--- INI BARIS YANG TERLEWAT

class LessonController extends Controller
{
    // Fungsi untuk menampilkan isi materi
    public function show($course_slug, $lesson_slug)
    {
        // 1. Cari kelasnya terlebih dahulu
        $course = Course::where('slug', $course_slug)->firstOrFail();
        
        // 2. Cari materi yang cocok dengan kelas tersebut
        $lesson = Lesson::where('course_id', $course->id)
                        ->where('slug', $lesson_slug)
                        ->firstOrFail();

        return view('lesson-detail', compact('course', 'lesson'));
    }

    // Fungsi untuk menandai materi selesai
    public function markAsComplete(Request $request, $course_slug, $lesson_slug)
    {
        $lesson = Lesson::where('slug', $lesson_slug)->firstOrFail();
        $user = Auth::user(); // Sekarang Laravel tahu dari mana mengambil fungsi Auth ini

        // Memasukkan data ke tabel pivot (jika belum ada) menggunakan syncWithoutDetaching
        $user->completedLessons()->syncWithoutDetaching([$lesson->id]);

        // Setelah ditandai selesai, kembalikan mahasiswa ke halaman daftar materi
        return redirect()->route('course.show', $course_slug)
                         ->with('success', 'Selamat! Kamu berhasil menyelesaikan materi: ' . $lesson->title);
    }
}