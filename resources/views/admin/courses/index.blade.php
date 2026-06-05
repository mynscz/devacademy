<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kelas - DevAcademy</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; background: #f8fafc; padding: 40px 50px; }
        
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .header h1 { margin: 0; color: #0f172a; }
        
        .btn-add { background: #38bdf8; color: white; text-decoration: none; padding: 10px 20px; border-radius: 8px; font-weight: bold; transition: 0.2s; }
        .btn-add:hover { background: #0284c7; }
        .btn-back { color: #64748b; text-decoration: none; margin-bottom: 20px; display: inline-block; font-weight: bold; }

        /* Desain Tabel */
        .table-container { background: white; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); overflow: hidden; }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th, td { padding: 15px 20px; border-bottom: 1px solid #f1f5f9; }
        th { background-color: #f8fafc; color: #64748b; text-transform: uppercase; font-size: 13px; letter-spacing: 1px; }
        td { color: #334155; }
        
        .course-icon { font-size: 24px; margin-right: 10px; vertical-align: middle; }
        
        /* Tombol Aksi */
        .btn-action { text-decoration: none; padding: 6px 12px; border-radius: 6px; font-size: 14px; font-weight: bold; margin-right: 5px; }
        .btn-edit { background: #fef08a; color: #854d0e; }
        .btn-delete { background: #fecdd3; color: #be123c; border: none; cursor: pointer; }
    </style>
</head>
<body>

    <a href="{{ route('admin.dashboard') }}" class="btn-back">⬅ Kembali ke Dashboard Admin</a>

    <div class="header">
        <h1>📚 Manajemen Kelas</h1>
        <a href="{{ route('admin.courses.create') }}" class="btn-add">+ Tambah Kelas Baru</a>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Judul Kelas</th>
                    <th>Deskripsi Singkat</th>
                    <th>Total Materi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $course)
                <tr>
                    <td>
                        <span class="course-icon">{{ $course->icon }}</span> 
                        <strong>{{ $course->title }}</strong>
                    </td>
                    <td>{{ Str::limit($course->description, 50) }}</td>
                    <td>{{ $course->lessons->count() }} Bab</td>
                    <td>
    <a href="{{ route('admin.courses.lessons.index', $course->id) }}" class="btn-action" style="background: #e0e7ff; color: #4f46e5;">Kelola Materi</a>
    
    <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn-action btn-edit">Edit</a>
    
    <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus kelas ini?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-action btn-delete">Hapus</button>
    </form>
</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align: center; padding: 30px; color: #94a3b8;">Belum ada kelas yang dibuat.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>