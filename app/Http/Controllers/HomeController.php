<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course; // Wajib dipanggil untuk mengakses tabel courses

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil semua data kelas dari database
        $courses = Course::all(); 

        return view('home', compact('courses'));
    }
}