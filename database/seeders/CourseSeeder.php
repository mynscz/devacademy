<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Membuat data Kelas (Course)
        $courseHtml = Course::create([
            'title' => 'Master HTML & CSS Dasar',
            'slug' => Str::slug('Master HTML & CSS Dasar'),
            'description' => 'Mulai petualanganmu membangun struktur dan menghias website dari nol.',
            'icon' => '🚀',
            'progress_default' => 0,
            'accent_color' => '#3b82f6'
        ]);

        // 2. Memasukkan Materi (Lesson) ke dalam kelas HTML di atas
        Lesson::create([
            'course_id' => $courseHtml->id,
            'title' => 'Bab 1: Pengenalan Struktur HTML',
            'slug' => Str::slug('Bab 1: Pengenalan Struktur HTML'),
            'content' => 'Di sini kita akan belajar tentang tag <html>, <head>, dan <body>.',
            'order_number' => 1
        ]);

        Lesson::create([
            'course_id' => $courseHtml->id,
            'title' => 'Bab 2: Membuat Formulir (Form)',
            'slug' => Str::slug('Bab 2: Membuat Formulir (Form)'),
            'content' => 'Belajar membuat input teks, password, dan tombol submit.',
            'order_number' => 2
        ]);
    }
}