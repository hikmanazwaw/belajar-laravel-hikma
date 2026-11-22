<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | HikmaTown</title>
    <style>
        :root {
            color-scheme: light;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            color: #172033;
            background: #f5f7fb;
        }

        * { box-sizing: border-box; }
        body { min-height: 100vh; display: grid; place-items: center; margin: 0; padding: 24px; }
        .login-card { width: min(100%, 420px); padding: 36px; border: 1px solid #e5e9f2; border-radius: 20px; background: #fff; box-shadow: 0 16px 48px rgb(23 32 51 / 8%); }
        .brand { margin: 0 0 8px; color: #4f46e5; font-size: 1rem; font-weight: 800; }
        h1 { margin: 0; font-size: 1.8rem; letter-spacing: -.03em; }
        .description { margin: 10px 0 26px; color: #667085; line-height: 1.6; }
        .form-field { display: grid; gap: 8px; margin-bottom: 18px; }
        label { color: #344054; font-weight: 700; }
        input { width: 100%; padding: 12px 14px; border: 1px solid #d5dae5; border-radius: 9px; color: #172033; font: inherit; }
        input:focus { border-color: #4f46e5; outline: 3px solid #4f46e522; }
        .button { width: 100%; margin-top: 8px; padding: 12px; border: 0; border-radius: 9px; background: #4f46e5; color: #fff; font: inherit; font-weight: 700; cursor: pointer; }
        .button:hover { background: #4338ca; }
        .field-error, .status-message { margin: 0; font-size: .9rem; }
        .field-error { color: #b42318; }
        .status-message { margin-bottom: 18px; color: #027a48; }
    </style>
</head>
<body>
    <main class="login-card">
        <p class="brand">Hikma Town</p>
        <h1>Login Users</h1>
        <p class="description">Masuk untuk membuka dashboard dan menu aplikasi.</p>

        @if (session('status'))
            <p class="status-message" role="status">{{ session('status') }}</p>
        @endif

        <form method="POST" action="{{ route('login.store') }}">
            @csrf
            <div class="form-field">
                <label for="email">Email</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    autocomplete="username"
                    required
                    autofocus
                    aria-describedby="email-error"
                >
                @error('email')
                    <p class="field-error" id="email-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-field">
                <label for="password">Password</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    autocomplete="current-password"
                    required
                    aria-describedby="password-error"
                >
                @error('password')
                    <p class="field-error" id="password-error">{{ $message }}</p>
                @enderror
            </div>

            <button class="button" type="submit">Login</button>
        </form>
    </main>
</body>
</html>
