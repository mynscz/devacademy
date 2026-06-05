<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevAcademy - Dashboard Belajar</title>
    <style>
        /* Gaya dasar halaman */
        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 40px 20px;
            color: #334155;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        header {
            text-align: center;
            margin-bottom: 50px;
        }

        header h1 {
            font-size: 36px;
            color: #1e293b;
            margin-bottom: 10px;
        }

        header p {
            font-size: 18px;
            color: #64748b;
            margin: 0;
        }

        /* Layout Grid untuk Kartu Kelas */
        .grid-courses {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        /* Desain Kartu yang 'Fun' dan Berpindah/Melayang saat Hover */
        .card-course {
            background: #ffffff;
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.03);
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
            border: 3px solid transparent;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-course:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.08);
        }

        .course-icon {
            font-size: 45px;
            margin-bottom: 15px;
        }

        .course-title {
            font-size: 22px;
            margin: 0 0 12px 0;
            color: #1e293b;
        }

        .course-desc {
            font-size: 15px;
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 25px;
            flex-grow: 1;
        }

        /* Progress Bar */
        .progress-wrapper {
            margin-bottom: 25px;
        }

        .progress-bg {
            background-color: #f1f5f9;
            border-radius: 50px;
            height: 10px;
            width: 100%;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            border-radius: 50px;
            transition: width 0.5s ease;
        }

        .progress-text {
            font-size: 13px;
            font-weight: bold;
            color: #94a3b8;
            text-align: right;
            margin: 8px 0 0 0;
        }

        /* Tombol Interaktif Memantul */
        .btn-start {
            display: block;
            text-align: center;
            text-decoration: none;
            color: white;
            font-weight: bold;
            padding: 14px;
            border-radius: 16px;
            transition: transform 0.2s ease, opacity 0.2s ease;
        }

        .btn-start:hover {
            opacity: 0.9;
            transform: scale(1.03);
        }

        .btn-start:active {
            transform: scale(0.97);
        }
    </style>
</head>
<body>

    <div style="text-align: right; padding: 20px 40px; background: white; box-shadow: 0 2px 10px rgba(0,0,0,0.05); margin-bottom: 30px;">
    @auth
        <span style="color: #64748b; margin-right: 15px;">Halo, {{ Auth::user()->name }}!</span>
        
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" style="background: none; border: none; color: #ef4444; font-weight: bold; cursor: pointer;">Log Out</button>
        </form>
    @else
        <a href="{{ route('login') }}" style="text-decoration: none; color: #64748b; font-weight: bold; margin-right: 20px;">Login</a>
        <a href="{{ route('register') }}" style="text-decoration: none; background: #3b82f6; color: white; padding: 8px 20px; border-radius: 50px; font-weight: bold;">Daftar</a>
    @endauth
</div>

    <div class="container">
        <header>
            <h1>Selamat Datang di DevAcademy ✨</h1>
            <p>Pilih petualangan kodemu hari ini dan kuasai teknologi web modern!</p>
        </header>

        <div class="grid-courses">
            @foreach($courses as $course)
                <div class="card-course" style="hover:border-color: {{ $course['color'] }}">
                    <div>
                        <div class="course-icon">{{ $course['icon'] }}</div>
                        <h2 class="course-title">{{ $course['title'] }}</h2>
                        <p class="course-desc">{{ $course['description'] }}</p>
                    </div>

                    <div>
                        <div class="progress-wrapper">
    <div class="progress-bg">
        <div class="progress-fill" style="width: {{ $course->userProgress() }}%; background-color: {{ $course->accent_color ?? '#3b82f6' }};"></div>
    </div>
    <p class="progress-text">{{ $course->userProgress() }}% Selesai</p>
</div>

<a href="{{ route('course.show', $course->slug) }}" class="btn-start" style="background-color: {{ $course->accent_color ?? '#3b82f6' }}">
    {{ $course->userProgress() > 0 ? 'Lanjutkan Belajar' : 'Mulai Belajar' }}
</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>