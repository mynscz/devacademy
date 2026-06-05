<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login DAN apakah rolenya adalah admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // Silakan masuk
        }

        // Jika bukan admin, tolak akses (munculkan error 403 atau tendang ke beranda)
        abort(403, 'Akses Ditolak. Halaman ini khusus Instruktur/Admin.');
    }
}