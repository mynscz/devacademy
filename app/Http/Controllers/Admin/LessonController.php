<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $courseId)
    {
        // 1. Cari data kelas induknya
        $course = Course::findOrFail($courseId);

        // 2. Ambil semua materi yang berelasi dengan kelas tersebut, urutkan berdasarkan nomor bab
        $lessons = Lesson::where('course_id', $courseId)->orderBy('order_number', 'asc')->get();

        return view('admin.lessons.index', compact('course', 'lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $courseId)
    {
        // Cari kelas induknya agar kita bisa menampilkan nama kelas di halaman form
        $course = Course::findOrFail($courseId);

        return view('admin.lessons.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $courseId)
    {
        // 1. Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'order_number' => 'required|integer|min:1',
            'content' => 'required|string',
        ]);

        // 2. Simpan materi baru dan kaitkan dengan ID kelas (course_id)
        Lesson::create([
            'course_id' => $courseId,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'order_number' => $request->order_number,
        ]);

        // 3. Kembali ke halaman daftar materi untuk kelas tersebut
        return redirect()->route('admin.courses.lessons.index', $courseId)
                         ->with('success', 'Materi bab baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $courseId, string $lessonId)
    {
        $course = Course::findOrFail($courseId);
        $lesson = Lesson::findOrFail($lessonId);
        
        return view('admin.lessons.edit', compact('course', 'lesson'));
    }

    public function update(Request $request, string $courseId, string $lessonId)
    {
        // 1. Validasi
        $request->validate([
            'title' => 'required|string|max:255',
            'order_number' => 'required|integer|min:1',
            'content' => 'required|string',
        ]);

        // 2. Update Data
        $lesson = Lesson::findOrFail($lessonId);
        $lesson->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'order_number' => $request->order_number,
        ]);

        return redirect()->route('admin.courses.lessons.index', $courseId)
                         ->with('success', 'Materi berhasil diperbarui!');
    }

    public function destroy(string $courseId, string $lessonId)
    {
        $lesson = Lesson::findOrFail($lessonId);
        $lesson->delete();

        return redirect()->route('admin.courses.lessons.index', $courseId)
                         ->with('success', 'Materi bab berhasil dihapus.');
    }
}
