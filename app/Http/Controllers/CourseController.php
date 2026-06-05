<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function show($slug)
    {
        // Mencari kelas berdasarkan slug url, dan memuat relasi materinya (lessons)
        $course = Course::with('lessons')->where('slug', $slug)->firstOrFail();

        return view('course-detail', compact('course'));
    }
}