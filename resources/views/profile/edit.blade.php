<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Profil - DevAcademy</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            background-color: #f8fafc;
            color: #0f172a;
        }

        /* --- NAVBAR --- */
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
        .nav-right { display: flex; align-items: center; gap: 20px; }
        .btn-logout { background: none; border: none; color: #ef4444; font-weight: 600; font-size: 15px; cursor: pointer; font-family: inherit; }

        /* --- MAIN CONTAINER --- */
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .btn-back { color: #64748b; text-decoration: none; margin-bottom: 20px; display: inline-block; font-weight: 600; transition: color 0.2s;}
        .btn-back:hover { color: #3b82f6; }

        .header-title { margin-bottom: 40px; }
        .header-title h1 { font-size: 32px; font-weight: 800; margin: 0 0 10px 0; }
        .header-title p { color: #64748b; margin: 0; font-size: 16px; }

        /* --- CARDS --- */
        .card {
            background: white;
            padding: 40px;
            border-radius: 24px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.02);
            border: 1px solid #f1f5f9;
            margin-bottom: 30px;
        }
        .card h2 { margin: 0 0 10px 0; font-size: 20px; font-weight: 700; }
        .card p.desc { color: #64748b; margin: 0 0 25px 0; font-size: 15px; line-height: 1.6; }

        .card-danger { border-color: #fee2e2; }
        .card-danger h2 { color: #dc2626; }

        /* --- FORMS --- */
        .form-group { margin-bottom: 20px; }
        label { display: block; font-weight: 600; margin-bottom: 8px; font-size: 14px; color: #475569; }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%; padding: 12px 16px; border: 2px solid #e2e8f0; border-radius: 12px; font-size: 15px; box-sizing: border-box; transition: all 0.2s; font-family: inherit;
        }
        input:focus { border-color: #3b82f6; outline: none; box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1); }
        
        .error-msg { color: #ef4444; font-size: 13px; margin-top: 5px; display: block; }
        .success-msg { color: #10b981; font-weight: 600; font-size: 14px; display: inline-block; margin-left: 15px; }

        .btn-save {
            background: #1e293b; color: white; border: none; padding: 12px 24px; border-radius: 10px; font-size: 15px; font-weight: 600; cursor: pointer; transition: 0.2s; font-family: inherit;
        }
        .btn-save:hover { background: #0f172a; transform: translateY(-2px); }

        .btn-danger {
            background: #ef4444; color: white; border: none; padding: 12px 24px; border-radius: 10px; font-size: 15px; font-weight: 600; cursor: pointer; transition: 0.2s; font-family: inherit;
        }
        .btn-danger:hover { background: #dc2626; transform: translateY(-2px); }

        /* Flex wrap untuk tombol dan pesan sukses */
        .form-actions { display: flex; align-items: center; margin-top: 30px; }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="{{ route('landing') }}" class="logo">
            <span class="logo-icon">⚡</span> DevAcademy
        </a>
        <div class="nav-right">
            <a href="{{ route('dashboard') }}" style="text-decoration: none; color: #3b82f6; font-weight: 600;">Kembali ke Dashboard</a>
        </div>
    </nav>

    <div class="container">
        
        <div class="header-title">
            <h1>⚙️ Pengaturan Profil</h1>
            <p>Kelola informasi data diri dan keamanan akun belajarmu di sini.</p>
        </div>

        <div class="card">
            <h2>Informasi Profil</h2>
            <p class="desc">Perbarui nama lengkap dan alamat email akunmu.</p>
            
            <form method="post" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required autofocus>
                    @error('name') <span class="error-msg">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label>Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
                    @error('email') <span class="error-msg">{{ $message }}</span> @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-save">Simpan Perubahan</button>
                    @if (session('status') === 'profile-updated')
                        <span class="success-msg">✓ Profil berhasil diperbarui.</span>
                    @endif
                </div>
            </form>
        </div>

        <div class="card">
            <h2>Perbarui Password</h2>
            <p class="desc">Pastikan akunmu menggunakan password acak yang panjang agar tetap aman.</p>
            
            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')

                <div class="form-group">
                    <label>Password Saat Ini</label>
                    <input type="password" name="current_password" required placeholder="••••••••">
                    @if($errors->updatePassword->has('current_password')) 
                        <span class="error-msg">{{ $errors->updatePassword->first('current_password') }}</span> 
                    @endif
                </div>

                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" name="password" required placeholder="Minimal 8 karakter">
                    @if($errors->updatePassword->has('password')) 
                        <span class="error-msg">{{ $errors->updatePassword->first('password') }}</span> 
                    @endif
                </div>

                <div class="form-group">
                    <label>Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" required placeholder="Ketik ulang password baru">
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-save">Ganti Password</button>
                    @if (session('status') === 'password-updated')
                        <span class="success-msg">✓ Password berhasil diganti.</span>
                    @endif
                </div>
            </form>
        </div>

        <div class="card card-danger">
            <h2>Hapus Akun</h2>
            <p class="desc">Sekali akun dihapus, semua sumber daya, data, dan progres belajarmu akan terhapus secara permanen. Tindakan ini tidak dapat dibatalkan.</p>
            
            <form method="post" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Apakah kamu benar-benar yakin ingin menghapus akun ini permanen?');">
                @csrf
                @method('delete')

                <div class="form-group">
                    <label>Masukkan Password untuk Konfirmasi</label>
                    <input type="password" name="password" required placeholder="Konfirmasi passwordmu">
                    @error('password', 'userDeletion') 
                        <span class="error-msg">{{ $message }}</span> 
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-danger">Hapus Akun Permanen</button>
                </div>
            </form>
        </div>

    </div>

</body>
</html>