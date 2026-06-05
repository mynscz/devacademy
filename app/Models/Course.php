<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = []; // Mengizinkan semua kolom diisi data

    // Satu Kelas (Course) memiliki banyak Materi (Lesson) -> One to Many
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

// Fungsi untuk menghitung persentase progres belajar mahasiswa yang sedang login
    public function userProgress()
    {
        // 1. Jika belum login, progresnya pasti 0%
        if (!auth()->check()) {
            return 0;
        }

        // 2. Hitung total seluruh materi yang ada di dalam kelas ini
        $totalLessons = $this->lessons()->count();
        
        // Cegah error pembagian dengan nol jika kelas belum punya materi
        if ($totalLessons === 0) {
            return 0; 
        }

        // 3. Hitung berapa materi di kelas ini yang SUDAH diselesaikan oleh user yang login
        $completedLessons = $this->lessons()
            ->whereHas('usersCompleted', function ($query) {
                $query->where('user_id', auth()->id());
            })->count();

        // 4. Hitung persentase: (Diselesaikan / Total) x 100, lalu bulatkan nilainya
        return round(($completedLessons / $totalLessons) * 100);
    }
    }