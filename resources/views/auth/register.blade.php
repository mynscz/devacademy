<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - DevAcademy</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif; margin: 0; min-height: 100vh; display: flex; align-items: center; justify-content: center; background: radial-gradient(circle at top right, #e0e7ff 0%, #f8fafc 100%); color: #0f172a; padding: 40px 20px; box-sizing: border-box;
        }

        .auth-card {
            background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); padding: 50px 40px; border-radius: 24px; box-shadow: 0 20px 40px rgba(0,0,0,0.04); width: 100%; max-width: 450px; border: 1px solid #f1f5f9; text-align: center;
        }

        .logo { font-size: 24px; font-weight: 800; color: #1e293b; text-decoration: none; display: flex; align-items: center; justify-content: center; gap: 8px; margin-bottom: 30px;}
        .logo-icon { background: linear-gradient(135deg, #3b82f6, #8b5cf6); -webkit-background-clip: text; color: transparent; font-size: 28px; }

        .auth-card h2 { margin: 0 0 10px 0; font-size: 24px; }
        .auth-card p { color: #64748b; margin: 0 0 30px 0; font-size: 15px; }

        .form-group { margin-bottom: 20px; text-align: left; }
        label { display: block; font-weight: 600; margin-bottom: 8px; font-size: 14px; color: #475569; }
        
        input[type="email"], input[type="password"], input[type="text"] {
            width: 100%; padding: 14px 16px; border: 2px solid #e2e8f0; border-radius: 12px; font-size: 15px; box-sizing: border-box; transition: all 0.2s; font-family: inherit;
        }
        input:focus { border-color: #3b82f6; outline: none; box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1); }

        .btn-submit {
            background: linear-gradient(135deg, #3b82f6, #6366f1); color: white; border: none; padding: 15px; border-radius: 12px; font-size: 16px; font-weight: 600; cursor: pointer; width: 100%; transition: all 0.3s ease; margin-top: 10px; font-family: inherit;
        }
        .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3); }

        .error-message { color: #ef4444; font-size: 13px; margin-top: 5px; display: block; }
        .auth-links { margin-top: 25px; font-size: 14px; color: #64748b; }
        .auth-links a { color: #3b82f6; text-decoration: none; font-weight: 600; }
        .auth-links a:hover { text-decoration: underline; }
    </style>
</head>
<body>

    <div class="auth-card">
        <a href="{{ route('landing') }}" class="logo">
            <span class="logo-icon">⚡</span> DevAcademy
        </a>
        
        <h2>Mulai Petualanganmu!</h2>
        <p>Buat akun baru untuk mulai belajar coding.</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Ketik namamu di sini">
                @error('name') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Alamat Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="contoh@email.com">
                @error('email') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required placeholder="Minimal 8 karakter">
                @error('password') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required placeholder="Ketik ulang passwordmu">
            </div>

            <button type="submit" class="btn-submit">Daftar Akun Sekarang</button>
        </form>

        <div class="auth-links">
            Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
        </div>
    </div>

</body>
</html>