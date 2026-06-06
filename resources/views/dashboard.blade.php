<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Saya - DevAcademy</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            background-color: #f8fafc;
            color: #0f172a;
        }

        /* --- NAVIGATION --- */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 5%;
            background: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo { font-size: 22px; font-weight: 800; color: #1e293b; text-decoration: none; display: flex; align-items: center; gap: 8px;}
        .logo-icon { background: linear-gradient(135deg, #3b82f6, #8b5cf6); -webkit-background-clip: text; color: transparent; font-size: 26px; }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .btn-logout {
            background: none;
            border: none;
            color: #ef4444;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            font-family: inherit;
        }

        /* --- MAIN CONTENT CONTAINER --- */
        .dashboard-container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
            box-sizing: border-box;
        }

        /* --- WELCOME BANNER --- */
        .welcome-banner {
            background: linear-gradient(135deg, #1e293b, #0f172a);
            color: white;
            padding: 40px;
            border-radius: 24px;
            margin-bottom: 35px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
        }

        .welcome-banner h1 {
            margin: 0 0 10px 0;
            font-size: 32px;
            font-weight: 800;
        }

        .welcome-banner p {
            margin: 0;
            color: #94a3b8;
            font-size: 16px;
            max-width: 500px;
            line-height: 1.5;
        }

        .welcome-badge {
            position: absolute;
            right: 40px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 70px;
            opacity: 0.15;
            user-select: none;
        }

        /* --- STATS GRID --- */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.02);
            border: 1px solid #f1f5f9;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .stat-info h3 {
            margin: 0 0 5px 0;
            font-size: 14px;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-info p {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
            color: #0f172a;
        }

        /* --- QUICK ACTIONS & PANELS --- */
        .dashboard-body {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
        }

        .main-panel, .side-panel {
            background: white;
            padding: 35px;
            border-radius: 24px;
            border: 1px solid #f1f5f9;
            box-shadow: 0 4px 15px rgba(0,0,0,0.02);
        }

        .panel-title {
            margin: 0 0 20px 0;
            font-size: 20px;
            font-weight: 700;
        }

        .btn-primary {
            display: inline-block;
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            color: white;
            text-decoration: none;
            padding: 14px 28px;
            border-radius: 50px;
            font-weight: 600;
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.2);
            transition: all 0.3s;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 25px rgba(59, 130, 246, 0.3);
        }

        .shortcut-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .shortcut-item {
            margin-bottom: 15px;
        }

        .shortcut-link {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #475569;
            text-decoration: none;
            font-weight: 600;
            padding: 10px;
            border-radius: 10px;
            transition: background 0.2s;
        }

        .shortcut-link:hover {
            background: #f1f5f9;
            color: #3b82f6;
        }

        /* =========================================
           MEDIA QUERIES (RESPONSIVE DESIGN)
           ========================================= */
        @media (max-width: 900px) {
            .dashboard-body {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .welcome-banner { padding: 30px 20px; }
            .welcome-badge { display: none; }
            .welcome-banner h1 { font-size: 26px; }
            .navbar { padding: 15px 20px; }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="{{ route('landing') }}" class="logo">
            <span class="logo-icon">⚡</span> DevAcademy
        </a>
        <div class="nav-right">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout">Keluar</button>
            </form>
        </div>
    </nav>

    <div class="dashboard-container">
        
        <div class="welcome-banner">
            <h1>Halo, {{ Auth::user()->name }}! 👋</h1>
            <p>Selamat datang di ruang belajar pribadimu. Terus tingkatkan kemampuan coding-mu dan bangun portofolio impian.</p>
            <div class="welcome-badge">💻</div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon" style="background: #e0e7ff; color: #4f46e5;">📚</div>
                <div class="stat-info">
                    <h3>Kelas Aktif</h3>
                    <p>Tersedia</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: #ecfdf5; color: #10b981;">🎯</div>
                <div class="stat-info">
                    <h3>Status Akun</h3>
                    <p style="font-size: 18px; color: #10b981; text-transform: capitalize;">{{ Auth::user()->role }}</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: #fef3c7; color: #d97706;">⚡</div>
                <div class="stat-info">
                    <h3>Mulai Belajar</h3>
                    <p style="font-size: 16px;"><a href="{{ route('home') }}" style="color: #d97706; text-decoration: none;">Buka Katalog →</a></p>
                </div>
            </div>
        </div>

        <div class="dashboard-body">
            <div class="main-panel">
                <h2 class="panel-title">Siap Melanjutkan Petualangan?</h2>
                <p style="color: #64748b; line-height: 1.6; margin-bottom: 30px;">
                    Jangan biarkan barisan kodemu berhenti. Kamu bisa melihat daftar kelas terbaru, melacak materi yang belum diselesaikan, dan mencoba modul praktik langsung di katalog utama kami.
                </p>
                <a href="{{ route('home') }}" class="btn-primary">Masuk ke Katalog Kelas</a>
            </div>

            <div class="side-panel">
                <h2 class="panel-title">Akses Cepat</h2>
                <ul class="shortcut-list">
                    <li class="shortcut-item">
                        <a href="{{ route('home') }}" class="shortcut-link">📁 Lihat Katalog Kelas</a>
                    </li>
                    <li class="shortcut-item">
                        <a href="{{ route('profile.edit') }}" class="shortcut-link">⚙️ Pengaturan Profil</a>
                    </li>
                    @if(Auth::user()->role === 'admin')
                        <li class="shortcut-item" style="border-top: 1px dashed #e2e8f0; padding-top: 10px; margin-top: 10px;">
                            <a href="{{ route('admin.dashboard') }}" class="shortcut-link" style="color: #8b5cf6;">🛠️ Masuk Panel Admin</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

    </div>

</body>
</html>