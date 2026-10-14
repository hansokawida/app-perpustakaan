
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Perpustakaan Digital Kampus</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 24px;
            font-family: Arial, Helvetica, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 36px;
            background: #ffffff;
            border-radius: 14px;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header h1 {
            margin: 0 0 10px;
            font-size: 25px;
            color: #1e3a8a;
        }

        .login-header p {
            margin: 0;
            font-size: 14px;
            color: #64748b;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group > label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #334155;
        }

        .form-group input[type="email"],
        .form-group input[type="password"] {
            display: block;
            width: 100%;
            height: 44px;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-group input[type="email"]:focus,
        .form-group input[type="password"]:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        .remember-row {
            display: flex;
            align-items: center;
            gap: 9px;
            margin: 2px 0 24px;
        }

        .remember-row input[type="checkbox"] {
            width: 16px;
            height: 16px;
            margin: 0;
            cursor: pointer;
            accent-color: #2563eb;
        }

        .remember-row label {
            font-size: 14px;
            color: #475569;
            cursor: pointer;
        }

        .btn-login {
            display: block;
            width: 100%;
            min-height: 44px;
            border: none;
            border-radius: 7px;
            background: #2563eb;
            color: white;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-login:hover {
            background: #1d4ed8;
        }

        .error-box {
            margin-bottom: 20px;
            padding: 12px 14px;
            border: 1px solid #fecaca;
            border-radius: 7px;
            background: #fef2f2;
            color: #b91c1c;
            font-size: 13px;
            line-height: 1.6;
        }

        .success-box {
            margin-bottom: 20px;
            padding: 12px 14px;
            border: 1px solid #bbf7d0;
            border-radius: 7px;
            background: #f0fdf4;
            color: #166534;
            font-size: 13px;
            line-height: 1.6;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 28px 22px;
            }

            .login-header h1 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>

    <main class="login-container">
        <div class="login-header">
            <h1>📚 Login Perpustakaan</h1>
            <p>Perpustakaan Digital Kampus</p>
        </div>

        @if (session('success'))
            <div class="success-box">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error-box">
                <strong>Login gagal.</strong>
                <ul style="margin: 6px 0 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/login') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email"
                    autocomplete="username"
                    required
                    autofocus
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    autocomplete="current-password"
                    required
                >
            </div>

            <div class="remember-row">
                <input
                    type="checkbox"
                    id="remember"
                    name="remember"
                    value="1"
                    @checked(old('remember'))
                >
                <label for="remember">Ingat saya</label>
            </div>

            <button type="submit" class="btn-login">Login</button>
        </form>
    </main>

</body>
</html>
