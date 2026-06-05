<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Materi - Admin</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; background: #f8fafc; padding: 40px 50px; color: #334155; }
        .header { margin-bottom: 30px; } .header h1 { margin: 0 0 10px 0; color: #0f172a; }
        .btn-back { color: #64748b; text-decoration: none; margin-bottom: 20px; display: inline-block; font-weight: bold; }
        .form-container { background: white; border-radius: 16px; padding: 40px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); max-width: 900px; }
        .form-group { margin-bottom: 25px; } label { display: block; font-weight: bold; margin-bottom: 8px; color: #1e293b; }
        input[type="text"], input[type="number"], textarea { width: 100%; padding: 12px 15px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 16px; box-sizing: border-box; }
        textarea { resize: vertical; min-height: 400px; font-family: monospace; font-size: 15px; line-height: 1.6; background-color: #f8fafc; }
        .btn-submit { background: #f59e0b; color: white; border: none; padding: 15px 30px; border-radius: 8px; font-size: 16px; font-weight: bold; cursor: pointer; width: 100%; }
    </style>
</head>
<body>

    <a href="{{ route('admin.courses.lessons.index', $course->id) }}" class="btn-back">⬅ Batal & Kembali</a>

    <div class="header">
        <h1>✏️ Edit Materi Bab</h1>
        <p>Kelas: <strong>{{ $course->title }}</strong></p>
    </div>

    <div class="form-container">
        <form action="{{ route('admin.courses.lessons.update', [$course->id, $lesson->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="display: grid; grid-template-columns: 1fr 3fr; gap: 20px;">
                <div class="form-group">
                    <label>Nomor Urut Bab</label>
                    <input type="number" name="order_number" value="{{ $lesson->order_number }}" required>
                </div>
                
                <div class="form-group">
                    <label>Judul Materi</label>
                    <input type="text" name="title" value="{{ $lesson->title }}" required>
                </div>
            </div>

            <div class="form-group">
                <label>Isi Teks Materi</label>
                <textarea name="content" required>{{ $lesson->content }}</textarea>
            </div>

            <button type="submit" class="btn-submit">Simpan Perubahan</button>
        </form>
    </div>

</body>
</html>