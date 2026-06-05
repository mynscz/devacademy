<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - DevAcademy</title>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            margin: 0; 
            background: #f8fafc; 
            display: flex; 
            height: 100vh; 
        }

        /* --- SIDEBAR KIRI --- */
        .sidebar { 
            width: 260px; 
            background: #1e293b; 
            color: white; 
            padding: 20px; 
            display: flex; 
            flex-direction: column; 
        }
        .sidebar h2 { color: #38bdf8; font-size: 24px; margin-bottom: 40px; text-align: center; }
        .nav-link { 
            color: #cbd5e1; 
            text-decoration: none; 
            padding: 12px 15px; 
            margin-bottom: 10px; 
            border-radius: 8px; 
            transition: all 0.2s;
            font-weight: 500;
        }
        .nav-link:hover, .nav-link.active { background: #334155; color: white; transform: translateX(5px); }
        .nav-footer { margin-top: auto; }

        /* --- KONTEN KANAN --- */
        .main-content { 
            flex: 1; 
            padding: 40px 50px; 
            overflow-y: auto; 
        }
        .header { margin-bottom: 30px; }
        .header h1 { margin: 0; color: #0f172a; }
        
        /* Kartu Ringkasan Data */
        .card-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); 
            gap: 25px; 
            margin-bottom: 40px; 
        }
        .stat-card { 
            background: white; 
            padding: 30px; 
            border-radius: 16px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.03); 
            border-left: 5px solid #38bdf8;
        }
        .stat-card h3 { margin: 0 0 10px 0; color: #64748b; font-size: 16px; text-transform: uppercase; letter-spacing: 1px;}
        .stat-card .number { font-size: 40px; font-weight: bold; color: #0f172a; margin: 0; }

        /* Panel Informasi Utama */
        .info-panel {
            background: white; 
            padding: 40px; 
            border-radius: 16px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>DevAcademy ⚡</h2>
        
        <a href="{{ route('admin.dashboard') }}" class="nav-link active">📊 Dashboard Utama</a>
<a href="{{ route('admin.courses.index') }}" class="nav-link">📚 Manajemen Kelas</a>
<a href="#" class="nav-link">👥 Data Mahasiswa</a>
        
        <div class="nav-footer">
            <a href="{{ route('home') }}" class="nav-link" style="color: #fb7185;">⬅ Kembali ke Web Depan</a>
        </div>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Ruang Kendali Instruktur</h1>
            <p style="color: #64748b;">Pantau seluruh aktivitas pembelajaran mahasiswa di sini.</p>
        </div>

        <div class="card-grid">
            <div class="stat-card">
                <h3>Total Kelas Aktif</h3>
                <p class="number">1</p> 
            </div>
            <div class="stat-card" style="border-left-color: #a855f7;">
                <h3>Total Mahasiswa</h3>
                <p class="number">1</p>
            </div>
        </div>

        <div class="info-panel">
            <h2 style="margin-top: 0; color: #0f172a;">Sistem Siap Digunakan!</h2>
            <p style="color: #475569; font-size: 18px; line-height: 1.6;">
                Selamat! Arsitektur keamanan admin telah berhasil diterapkan. Melalui panel ini, pembuatan modul HTML, CSS, PHP, hingga Laravel nantinya tidak lagi memerlukan akses langsung ke *database*, melainkan cukup melalui form interaktif yang akan kita bangun di menu "Manajemen Kelas".
            </p>
        </div>
    </div>

</body>
</html>