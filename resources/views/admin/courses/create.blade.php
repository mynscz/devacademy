<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kelas - DevAcademy Admin</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; background: #f8fafc; padding: 40px 50px; color: #334155; }
        
        .header { margin-bottom: 30px; }
        .header h1 { margin: 0 0 10px 0; color: #0f172a; }
        
        .btn-back { color: #64748b; text-decoration: none; margin-bottom: 20px; display: inline-block; font-weight: bold; }
        .btn-back:hover { color: #1e293b; }

        /* Desain Form */
        .form-container { background: white; border-radius: 16px; padding: 40px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); max-width: 800px; }
        
        .form-group { margin-bottom: 25px; }
        label { display: block; font-weight: bold; margin-bottom: 8px; color: #1e293b; }
        
        input[type="text"], textarea, input[type="color"] {
            width: 100%; padding: 12px 15px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 16px; box-sizing: border-box; transition: border-color 0.2s;
        }
        input[type="text"]:focus, textarea:focus { border-color: #38bdf8; outline: none; box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.1); }
        
        textarea { resize: vertical; min-height: 120px; }
        
        /* Input Warna Khusus */
        .color-picker-wrapper { display: flex; align-items: center; gap: 15px; }
        input[type="color"] { width: 60px; height: 50px; padding: 5px; cursor: pointer; }
        
        .btn-submit { background: #38bdf8; color: white; border: none; padding: 15px 30px; border-radius: 8px; font-size: 16px; font-weight: bold; cursor: pointer; transition: 0.2s; width: 100%; }
        .btn-submit:hover { background: #0284c7; }

        /* Pesan Error Validasi */
        .error-text { color: #ef4444; font-size: 14px; margin-top: 5px; display: block; }
    </style>
</head>
<body>

    <a href="{{ route('admin.courses.index') }}" class="btn-back">⬅ Batal & Kembali</a>

    <div class="header">
        <h1>✨ Tambah Kelas Baru</h1>
        <p>Isi detail di bawah ini untuk merilis modul pembelajaran baru.</p>
    </div>

    <div class="form-container">
        <form action="{{ route('admin.courses.store') }}" method="POST">
            @csrf <div class="form-group">
                <label>Judul Kelas</label>
                <input type="text" name="title" placeholder="Contoh: Pengenalan JavaScript" required>
            </div>

            <div class="form-group">
                <label>Ikon Kelas (Emoji)</label>
                <input type="text" name="icon" placeholder="Contoh: ⚡ atau 💻" required>
            </div>

            <div class="form-group">
                <label>Deskripsi Singkat</label>
                <textarea name="description" placeholder="Jelaskan secara singkat apa yang akan dipelajari di kelas ini..." required></textarea>
            </div>

            <div class="form-group">
                <label>Warna Tema Kelas (Accent Color)</label>
                <div class="color-picker-wrapper">
                    <input type="color" name="accent_color" value="#38bdf8">
                    <span style="color: #64748b; font-size: 14px;">Warna ini akan digunakan untuk tombol dan border kartu.</span>
                </div>
            </div>

            <button type="submit" class="btn-submit">Simpan Kelas Baru</button>
        </form>
    </div>

</body>
</html>