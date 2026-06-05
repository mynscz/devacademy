<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Materi - {{ $course->title }}</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; background: #f8fafc; padding: 40px 50px; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .header h1 { margin: 0; color: #0f172a; }
        .btn-add { background: #10b981; color: white; text-decoration: none; padding: 10px 20px; border-radius: 8px; font-weight: bold; }
        .btn-back { color: #64748b; text-decoration: none; margin-bottom: 20px; display: inline-block; font-weight: bold; }
        .table-container { background: white; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); overflow: hidden; }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th, td { padding: 15px 20px; border-bottom: 1px solid #f1f5f9; }
        th { background-color: #f8fafc; color: #64748b; text-transform: uppercase; font-size: 13px; }
        td { color: #334155; }
        .badge-number { background: #e2e8f0; padding: 5px 12px; border-radius: 50px; font-weight: bold; color: #475569; }
        .btn-action { text-decoration: none; padding: 6px 12px; border-radius: 6px; font-size: 14px; font-weight: bold; margin-right: 5px; }
        .btn-edit { background: #fef08a; color: #854d0e; }
        .btn-delete { background: #fecdd3; color: #be123c; border: none; cursor: pointer; }
    </style>
</head>
<body>

    <a href="{{ route('admin.courses.index') }}" class="btn-back">⬅ Kembali ke Daftar Kelas</a>

    <div class="header">
        <div>
            <span style="font-size: 24px;">{{ $course->icon }}</span>
            <h1 style="display: inline-block; margin-left: 10px;">Materi: {{ $course->title }}</h1>
        </div>
        <a href="{{ route('admin.courses.lessons.create', $course->id) }}" class="btn-add">+ Tambah Bab Baru</a>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Urutan</th>
                    <th>Judul Bab</th>
                    <th>Terakhir Diperbarui</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($lessons as $lesson)
                <tr>
                    <td><span class="badge-number">Bab {{ $lesson->order_number }}</span></td>
                    <td><strong>{{ $lesson->title }}</strong></td>
                    <td>{{ $lesson->updated_at->diffForHumans() }}</td>
                    <td>
    <a href="{{ route('admin.courses.lessons.edit', [$course->id, $lesson->id]) }}" class="btn-action btn-edit">Edit</a>
    
    <form action="{{ route('admin.courses.lessons.destroy', [$course->id, $lesson->id]) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus materi bab ini?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-action btn-delete">Hapus</button>
    </form>
</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align: center; padding: 30px; color: #94a3b8;">Belum ada materi untuk kelas ini.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>