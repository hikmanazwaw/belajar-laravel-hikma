<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') | HikmaTown</title>
    <style>
        :root {
            color-scheme: light;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            color: #172033;
            background: #f5f7fb;
        }

        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; }
        a { color: inherit; }
        .dashboard-header {
            min-height: 72px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 0 32px;
            border-bottom: 1px solid #e5e9f2;
            background: #fff;
        }
        .dashboard-brand { color: #4f46e5; font-size: 1.25rem; font-weight: 800; text-decoration: none; }
        .dashboard-header-label { color: #667085; font-size: .95rem; }
        .dashboard-shell { min-height: calc(100vh - 72px); display: grid; grid-template-columns: 240px minmax(0, 1fr); }
        .dashboard-sidebar { padding: 28px 18px; border-right: 1px solid #e5e9f2; background: #fff; }
        .sidebar-heading { margin: 0 12px 14px; color: #7a8292; font-size: .75rem; font-weight: 800; letter-spacing: .1em; text-transform: uppercase; }
        .sidebar-links { display: grid; gap: 6px; }
        .sidebar-links a {
            padding: 11px 12px;
            border-radius: 9px;
            color: #596174;
            font-size: .95rem;
            text-decoration: none;
        }
        .sidebar-links a:hover, .sidebar-links a[aria-current="page"] { background: #eef0ff; color: #4338ca; }
        .dashboard-content { min-width: 0; padding: 48px clamp(24px, 5vw, 64px); }
        .dashboard-content h1 { margin: 0; font-size: clamp(2rem, 4vw, 3rem); letter-spacing: -.04em; }
        .dashboard-content p { max-width: 680px; margin: 16px 0 0; color: #667085; font-size: 1.05rem; line-height: 1.75; }
        @media (max-width: 640px) {
            .dashboard-header { min-height: 64px; padding: 0 20px; }
            .dashboard-shell { min-height: calc(100vh - 64px); grid-template-columns: 1fr; }
            .dashboard-sidebar { padding: 16px 20px; border-right: 0; border-bottom: 1px solid #e5e9f2; }
            .sidebar-links { grid-template-columns: repeat(auto-fit, minmax(100px, 1fr)); }
            .dashboard-content { padding: 32px 20px; }
        }
    </style>
</head>
<body>
    <header class="dashboard-header" aria-label="Header utama">
        <a class="dashboard-brand" href="{{ route('dashboard') }}">Hikma Town</a>
        <span class="dashboard-header-label">Dashboard</span>
    </header>

    <div class="dashboard-shell">
        <aside class="dashboard-sidebar">
            <nav aria-label="Navigasi utama">
                <p class="sidebar-heading">Menu utama</p>
                <div class="sidebar-links">
                    <a href="{{ route('dashboard') }}" @if (request()->routeIs('dashboard')) aria-current="page" @endif>Dashboard</a>
                    <a href="{{ route('home') }}">Home</a>
                    <a href="{{ route('product') }}">Product</a>
                    <a href="{{ route('about') }}">About</a>
                    <a href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
                    <a href="{{ route('kalkulator.segitiga') }}">Kalkulator</a>
                </div>
            </nav>
        </aside>

        <main class="dashboard-content" aria-label="Konten utama">
            @yield('content')
        </main>
    </div>
</body>
</html>
