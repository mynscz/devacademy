<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $lesson->title }} - DevAcademy</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
            margin: 0;
            padding: 0;
            color: #334155;
            line-height: 1.8; /* Jarak antar baris diperlebar agar nyaman dibaca */
        }

        /* Navigasi Atas */
        .top-nav {
            background-color: white;
            padding: 15px 40px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .btn-back {
            text-decoration: none;
            color: #64748b;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-back:hover {
            color: #1e293b;
        }

        /* Area Konten Utama */
        .reading-container {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            padding: 50px 60px;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        }

        .lesson-header {
            border-bottom: 2px dashed #e2e8f0;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .lesson-badge {
            background: #e0e7ff;
            color: #4f46e5;
            padding: 6px 15px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 15px;
        }

        .lesson-title {
            font-size: 36px;
            color: #1e293b;
            margin: 0;
            line-height: 1.3;
        }

        /* Isi Teks Materi */
        .lesson-content {
            font-size: 18px;
            color: #475569;
        }

        /* Tombol Selesai */
        .action-bar {
            margin-top: 50px;
            text-align: center;
            padding-top: 30px;
            border-top: 2px solid #f1f5f9;
        }

        .btn-complete {
            background-color: #10b981;
            color: white;
            border: none;
            padding: 15px 40px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 50px;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
            transition: all 0.2s ease;
        }

        .btn-complete:hover {
            transform: scale(1.05);
            background-color: #059669;
        }
    </style>
</head>
<body>

    <nav class="top-nav">
        <a href="{{ route('course.show', $course->slug) }}" class="btn-back">
            <span>⬅</span> Kembali ke Daftar Materi
        </a>
    </nav>

    <main class="reading-container">
        <header class="lesson-header">
            <div class="lesson-badge">Bab {{ $lesson->order_number }}</div>
            <h1 class="lesson-title">{{ $lesson->title }}</h1>
        </header>

        <article class="lesson-content">
            {!! nl2br(e($lesson->content)) !!}
        </article>

        <div class="action-bar">
    @auth
        <form action="{{ route('lesson.complete', ['course_slug' => $course->slug, 'lesson_slug' => $lesson->slug]) }}" method="POST">
            @csrf <button type="submit" class="btn-complete">✔ Tandai Selesai & Lanjut</button>
        </form>
    @else
        <p style="color: #64748b; margin-bottom: 10px;">Kamu harus login untuk menyimpan progres belajar.</p>
        <a href="{{ route('login') }}" class="btn-complete" style="text-decoration: none; display: inline-block;">Login Sekarang</a>
    @endauth
</div>
    </main>

</body>
</html>