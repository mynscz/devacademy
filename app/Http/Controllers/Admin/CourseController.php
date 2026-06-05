<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        // Mengambil semua data kelas dan mengurutkannya dari yang terbaru
        $courses = Course::latest()->get();

        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan halaman form tambah kelas
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi keamanan data (Pastikan semua kolom diisi)
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:10',
            'description' => 'required|string',
            'accent_color' => 'required|string|max:20',
        ]);

        // 2. Simpan data ke tabel courses
        Course::create([
            'title' => $request->title,
            // Otomatis membuat URL yang ramah (Misal: "Belajar PHP" menjadi "belajar-php")
            'slug' => Str::slug($request->title), 
            'icon' => $request->icon,
            'description' => $request->description,
            'accent_color' => $request->accent_color,
            'progress_default' => 0
        ]);

        // 3. Kembali ke halaman tabel dengan pesan sukses
        return redirect()->route('admin.courses.index')->with('success', 'Kelas baru berhasil ditambahkan!');
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
    public function edit(string $id)
    {
        // Mencari data kelas yang ingin diedit
        $course = Course::findOrFail($id);
        
        // Menampilkan halaman form edit beserta data lama
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, string $id)
    {
        // 1. Validasi data
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:10',
            'description' => 'required|string',
            'accent_color' => 'required|string|max:20',
        ]);

        // 2. Cari kelasnya dan update datanya
        $course = Course::findOrFail($id);
        $course->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title), // Perbarui URL jika judul diganti
            'icon' => $request->icon,
            'description' => $request->description,
            'accent_color' => $request->accent_color,
        ]);

        // 3. Kembali ke tabel dengan pesan sukses
        return redirect()->route('admin.courses.index')->with('success', 'Kelas berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari kelasnya, lalu hapus dari database
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Kelas berhasil dihapus permanen.');
    }
}
