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
        .dashboard-content .page-heading { display: flex; align-items: center; justify-content: space-between; gap: 20px; }
        .dashboard-content .page-heading p { margin-top: 10px; }
        .dashboard-content .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 16px;
            border: 0;
            border-radius: 9px;
            background: #4f46e5;
            color: #fff;
            font: inherit;
            font-size: .92rem;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
        }
        .dashboard-content .button:hover { background: #4338ca; }
        .dashboard-content .button-secondary { background: #eef0ff; color: #4338ca; }
        .dashboard-content .button-secondary:hover { background: #e1e3ff; }
        .dashboard-content .button-danger { background: #b42318; }
        .dashboard-content .button-danger:hover { background: #912018; }
        .dashboard-content .table-wrap { margin-top: 24px; overflow-x: auto; border: 1px solid #e7eaf1; border-radius: 14px; background: #fff; }
        .dashboard-content table { width: 100%; border-collapse: collapse; text-align: left; }
        .dashboard-content th, .dashboard-content td { padding: 14px 16px; border-bottom: 1px solid #edf0f5; }
        .dashboard-content th { background: #f8f9fc; color: #596174; font-size: .8rem; letter-spacing: .05em; text-transform: uppercase; }
        .dashboard-content tbody tr:last-child td { border-bottom: 0; }
        .dashboard-content .actions { display: flex; align-items: center; gap: 8px; white-space: nowrap; }
        .dashboard-content .actions form { margin: 0; }
        .dashboard-content .actions .button { padding: 8px 11px; }
        .dashboard-content .form-card, .dashboard-content .detail-card {
            max-width: 720px;
            margin-top: 24px;
            padding: 26px;
            border: 1px solid #e7eaf1;
            border-radius: 16px;
            background: #fff;
        }
        .dashboard-content .form-field { display: grid; gap: 8px; margin-bottom: 18px; }
        .dashboard-content .form-field label { color: #344054; font-weight: 700; }
        .dashboard-content .form-field input,
        .dashboard-content .form-field select,
        .dashboard-content .form-field textarea {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid #d5dae5;
            border-radius: 9px;
            color: #172033;
            background: #fff;
            font: inherit;
        }
        .dashboard-content .form-field textarea { min-height: 110px; resize: vertical; }
        .dashboard-content .form-field input:focus,
        .dashboard-content .form-field select:focus,
        .dashboard-content .form-field textarea:focus { border-color: #4f46e5; outline: 3px solid #4f46e522; }
        .dashboard-content .field-error { margin: 0; color: #b42318; font-size: .9rem; }
        .dashboard-content .status-message { margin: 20px 0 0; padding: 12px 16px; border-radius: 9px; background: #ecfdf3; color: #027a48; }
        .dashboard-content .detail-list { display: grid; grid-template-columns: minmax(110px, .4fr) 1fr; gap: 14px 20px; margin: 0; }
        .dashboard-content .detail-list dt { color: #667085; font-weight: 700; }
        .dashboard-content .detail-list dd { margin: 0; overflow-wrap: anywhere; }
        .dashboard-content .pagination { margin-top: 20px; }
        @media (max-width: 640px) {
            .dashboard-header { min-height: 64px; padding: 0 20px; }
            .dashboard-shell { min-height: calc(100vh - 64px); grid-template-columns: 1fr; }
            .dashboard-sidebar { padding: 16px 20px; border-right: 0; border-bottom: 1px solid #e5e9f2; }
            .sidebar-links { grid-template-columns: repeat(auto-fit, minmax(100px, 1fr)); }
            .dashboard-content { padding: 32px 20px; }
            .dashboard-content .page-heading { align-items: flex-start; flex-direction: column; }
            .dashboard-content .detail-list { grid-template-columns: 1fr; gap: 6px; }
            .dashboard-content .detail-list dd { margin-bottom: 12px; }
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
                    <a href="{{ route('employes.index') }}" @if (request()->routeIs('employes.*')) aria-current="page" @endif>Pegawai</a>
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
