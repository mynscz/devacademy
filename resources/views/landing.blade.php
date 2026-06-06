<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevAcademy - Mulai Karir Codingmu</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8fafc;
            color: #0f172a;
            overflow-x: hidden;
        }

        /* --- NAVIGASI --- */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 5%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 100;
            box-sizing: border-box;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        }

        .logo { font-size: 22px; font-weight: 800; color: #1e293b; text-decoration: none; display: flex; align-items: center; gap: 8px;}
        .logo-icon { background: linear-gradient(135deg, #3b82f6, #8b5cf6); -webkit-background-clip: text; color: transparent; font-size: 26px; }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .nav-links a {
            text-decoration: none;
            color: #475569;
            font-weight: 600;
            transition: color 0.2s;
            font-size: 15px;
        }
        .nav-links a:hover { color: #3b82f6; }
        
        .btn-nav-primary {
            background: #1e293b; color: white !important; padding: 10px 20px; border-radius: 50px;
        }
        .btn-nav-primary:hover { background: #0f172a; transform: translateY(-2px); }

        /* --- HERO SECTION --- */
        .hero {
            padding: 150px 5% 80px;
            text-align: center;
            background: radial-gradient(circle at top right, #e0e7ff 0%, #f8fafc 40%);
        }

        .hero h1 {
            font-size: 52px;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 20px;
            letter-spacing: -1px;
        }

        .text-gradient {
            background: linear-gradient(to right, #3b82f6, #8b5cf6);
            -webkit-background-clip: text;
            color: transparent;
        }

        .hero p {
            font-size: 18px;
            color: #64748b;
            max-width: 600px;
            margin: 0 auto 40px;
            line-height: 1.6;
        }

        .cta-group {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .btn {
            padding: 15px 32px;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            color: white;
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(59, 130, 246, 0.4);
        }

        .btn-outline {
            background: white;
            color: #334155;
            border: 2px solid #e2e8f0;
        }

        .btn-outline:hover {
            border-color: #cbd5e1;
            background: #f1f5f9;
        }

        /* --- FEATURES SECTION --- */
        .features {
            padding: 60px 5%;
            background: white;
            text-align: center;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 40px;
            max-width: 1200px;
            margin-inline: auto;
        }

        .feature-card {
            padding: 40px 25px;
            background: #f8fafc;
            border-radius: 24px;
            transition: transform 0.3s ease;
            border: 1px solid #f1f5f9;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.04);
            background: white;
        }

        .feature-icon {
            font-size: 40px;
            margin-bottom: 20px;
        }

        .feature-card h3 { margin: 0 0 15px 0; font-size: 20px; }
        .feature-card p { color: #64748b; line-height: 1.6; margin: 0; }

        /* --- FOOTER --- */
        footer {
            background: #0f172a;
            color: #94a3b8;
            text-align: center;
            padding: 30px 5%;
        }
        .footer-logo { color: white; font-weight: 800; font-size: 20px; margin-bottom: 10px;}

        /* =========================================
           MEDIA QUERIES (RESPONSIVE MOBILE DESIGN)
           ========================================= */
        @media (max-width: 768px) {
            /* Perbaikan Navigasi */
            nav {
                flex-direction: column;
                padding: 15px;
                gap: 15px;
            }
            .nav-links {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
                gap: 15px;
            }
            .nav-links a {
                font-size: 14px;
            }
            
            /* Perbaikan Area Hero (Teks & Tombol) */
            .hero {
                padding: 140px 5% 60px;
            }
            .hero h1 {
                font-size: 34px; /* Teks dikecilkan untuk HP */
            }
            .hero p {
                font-size: 16px;
            }
            .cta-group {
                flex-direction: column; /* Tombol dibuat ke bawah, bukan ke samping */
                gap: 15px;
                width: 100%;
                max-width: 300px;
                margin: 0 auto;
            }
            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>

    <nav>
        <a href="{{ route('landing') }}" class="logo">
            <span class="logo-icon">⚡</span> DevAcademy
        </a>
        <div class="nav-links">
            <a href="{{ route('home') }}">Katalog Kelas</a>
            @auth
                <a href="{{ route('dashboard') }}" class="btn-nav-primary">Dashboard Saya</a>
            @else
                <a href="{{ route('login') }}">Masuk</a>
                <a href="{{ route('register') }}" class="btn-nav-primary">Daftar Gratis</a>
            @endauth
        </div>
    </nav>

    <section class="hero">
        <h1>Kuasai Skill Coding.<br> Bangun <span class="text-gradient">Karir Masa Depanmu.</span></h1>
        <p>Platform e-learning interaktif dengan kurikulum terstruktur. Belajar dari nol hingga mahir membuat aplikasi web dan sistem informasi.</p>
        
        <div class="cta-group">
            <a href="{{ route('register') }}" class="btn btn-primary">Mulai Belajar Sekarang</a>
            <a href="{{ route('home') }}" class="btn btn-outline">Lihat Daftar Kelas</a>
        </div>
    </section>

    <section class="features">
        <h2 style="font-size: 32px; margin-bottom: 10px;">Mengapa Belajar di Sini?</h2>
        <p style="color: #64748b; font-size: 16px;">Didesain khusus agar materi mudah dipahami dan langsung bisa dipraktikkan.</p>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">📚</div>
                <h3>Materi Terstruktur</h3>
                <p>Kurikulum disusun secara bertahap (step-by-step) mulai dari HTML dasar hingga *framework* tingkat lanjut.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🎯</div>
                <h3>Gamifikasi Progres</h3>
                <p>Pantau persentase belajarmu secara *real-time*. Dapatkan lencana setiap kali menyelesaikan modul kelas.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🚀</div>
                <h3>Fokus pada Praktik</h3>
                <p>Bukan sekadar teori. Kamu akan dibimbing untuk langsung membuat proyek nyata yang bisa dimasukkan ke portofolio.</p>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-logo">⚡ DevAcademy</div>
        <p>&copy; {{ date('Y') }} Dibangun dengan Laravel. Hak Cipta Dilindungi.</p>
    </footer>

</body>
</html>