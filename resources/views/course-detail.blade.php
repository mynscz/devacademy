<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->title }} - DevAcademy</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
            margin: 0;
            padding: 40px 20px;
            color: #334155;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        /* Tombol Kembali */
        .btn-back {
            display: inline-block;
            text-decoration: none;
            color: #64748b;
            font-weight: bold;
            margin-bottom: 20px;
            padding: 10px 20px;
            background: white;
            border-radius: 50px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            transition: all 0.2s ease;
        }

        .btn-back:hover {
            color: #1e293b;
            transform: translateX(-5px);
        }

        /* Header Kelas */
        .course-header {
            background: white;
            padding: 40px;
            border-radius: 24px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.03);
            margin-bottom: 40px;
            border-top: 8px solid {{ $course->accent_color ?? '#bc84ee' }};
        }

        .course-header .icon {
            font-size: 60px;
            margin-bottom: 15px;
        }

        .course-header h1 {
            font-size: 32px;
            margin: 0 0 15px 0;
            color: #1e293b;
        }

        .course-header p {
            font-size: 18px;
            color: #64748b;
            line-height: 1.6;
        }

        /* Daftar Materi (Lessons) */
        .lesson-list h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #1e293b;
        }

        .lesson-card {
            background: white;
            border-radius: 20px;
            padding: 20px 30px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 15px rgba(0,0,0,0.02);
            transition: transform 0.2s ease;
        }

        .lesson-card:hover {
            transform: translateX(10px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.05);
        }

        .lesson-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .lesson-number {
            background: #f1f5f9;
            color: #475569;
            font-size: 20px;
            font-weight: bold;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .lesson-title {
            font-size: 18px;
            font-weight: bold;
            color: #1e293b;
            margin: 0;
        }

        /* Tombol Baca */
        .btn-read {
            background-color: #3b82f6;
            color: white;
            text-decoration: none;
            padding: 10px 24px;
            border-radius: 50px;
            font-weight: bold;
            transition: background 0.2s;
        }

        .btn-read:hover {
            background-color: #2563eb;
        }
    </style>
</head>
<body>

    <div class="container">
        <a href="{{ route('home') }}" class="btn-back">⬅ Kembali ke Dashboard</a>

        <header class="course-header">
            <div class="icon">{{ $course->icon }}</div>
            <h1>{{ $course->title }}</h1>
            <p>{{ $course->description }}</p>
        </header>

        <div class="lesson-list">
            <h2>Daftar Materi</h2>
            
            @forelse($course->lessons as $lesson)
                <div class="lesson-card">
                    <div class="lesson-info">
                        <div class="lesson-number">{{ $lesson->order_number }}</div>
                        <h3 class="lesson-title">{{ $lesson->title }}</h3>

@auth
    @if($lesson->usersCompleted->contains(Auth::user()->id))
        <span style="background-color: #10b981; color: white; font-size: 12px; padding: 3px 10px; border-radius: 50px; margin-left: 10px; font-weight: bold;">
            ✔ Selesai
        </span>
    @endif
@endauth
                    </div>
                    <a href="{{ route('lesson.show', ['course_slug' => $course->slug, 'lesson_slug' => $lesson->slug]) }}" class="btn-read">Baca Materi</a>
                </div>
            @empty
                <p style="color: #94a3b8; text-align: center; padding: 20px;">Belum ada materi di kelas ini.</p>
            @endforelse
        </div>
    </div>

</body>
</html>