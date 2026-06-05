<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Nanti kita akan tambahkan Use Model di sini untuk membuat angka statistik menjadi otomatis

class DashboardController extends Controller
{
    public function index()
    {
        // Memanggil file dashboard.blade.php yang ada di dalam folder resources/views/admin/
        return view('admin.dashboard');
    }
}