<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | HikmaTown</title>
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
        .site-header { background: #fff; border-bottom: 1px solid #e5e9f2; }
        .nav {
            width: min(1080px, calc(100% - 40px));
            min-height: 76px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }
        .brand { color: #4f46e5; font-size: 1.3rem; font-weight: 800; text-decoration: none; }
        .nav-links { display: flex; flex-wrap: wrap; gap: 24px; }
        .nav-links a { color: #596174; font-size: .95rem; text-decoration: none; }
        .nav-links a:hover, .text-link:hover { color: #4338ca; }
        main { width: min(1080px, calc(100% - 40px)); margin: 0 auto; padding: 64px 0 80px; }
        .eyebrow { margin: 0 0 12px; color: #4f46e5; font-size: .78rem; font-weight: 800; letter-spacing: .13em; text-transform: uppercase; }
        h1 { margin: 0; font-size: clamp(2.2rem, 5vw, 3.5rem); letter-spacing: -.045em; line-height: 1.1; }
        .lead { max-width: 650px; margin: 18px 0 0; color: #667085; font-size: 1.1rem; line-height: 1.75; }
        .hero {
            padding: clamp(32px, 7vw, 72px);
            overflow: hidden;
            border: 1px solid #e5e7ff;
            border-radius: 24px;
            background: linear-gradient(130deg, #fff 20%, #eef0ff 100%);
        }
        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-top: 28px;
            padding: 12px 20px;
            border: 0;
            border-radius: 10px;
            background: #4f46e5;
            color: #fff;
            font-weight: 700;
            text-decoration: none;
        }
        .button:hover { background: #4338ca; }
        .product-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 18px; margin-top: 34px; }
        .product-card {
            padding: 25px;
            border: 1px solid #e7eaf1;
            border-radius: 16px;
            background: #fff;
            box-shadow: 0 8px 26px rgb(23 32 51 / 4%);
        }
        .product-card h2 { margin: 0; font-size: 1.3rem; }
        .price { margin: 12px 0 0; color: #596174; }
        .text-link { display: inline-block; margin-top: 20px; color: #4f46e5; font-weight: 700; text-decoration: none; }
        .table-wrap { margin-top: 32px; overflow-x: auto; border: 1px solid #e7eaf1; border-radius: 16px; background: #fff; }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th, td { padding: 16px 20px; border-bottom: 1px solid #edf0f5; }
        th { background: #f8f9fc; color: #596174; font-size: .82rem; letter-spacing: .06em; text-transform: uppercase; }
        tbody tr:last-child td { border-bottom: 0; }
        tbody tr:hover { background: #fafaff; }
        .form-card { max-width: 620px; margin-top: 30px; padding: 28px; border: 1px solid #e7eaf1; border-radius: 18px; background: #fff; }
        .form-field { display: grid; gap: 8px; margin-bottom: 20px; }
        .form-field label { font-weight: 700; }
        .form-field input { width: 100%; padding: 12px 14px; border: 1px solid #d5dae5; border-radius: 9px; color: #172033; font: inherit; }
        .form-field input:focus { border-color: #4f46e5; outline: 3px solid #4f46e522; }
        .field-error { margin: 0; color: #b42318; font-size: .9rem; }
        .result-card { max-width: 620px; margin-top: 24px; padding: 24px; border: 1px solid #c9c7ff; border-radius: 16px; background: #f1f0ff; }
        .result-value { margin: 8px 0 0; color: #4338ca; font-size: 1.8rem; font-weight: 800; }
        .detail-card {
            max-width: 620px;
            margin-top: 30px;
            padding: 30px;
            border: 1px solid #e7eaf1;
            border-radius: 18px;
            background: #fff;
        }
        .detail-price { margin: 14px 0 0; color: #4f46e5; font-size: 2rem; font-weight: 800; }
        .site-footer { padding: 22px 20px; border-top: 1px solid #e5e9f2; color: #7a8292; text-align: center; }
        @media (max-width: 520px) {
            .nav { min-height: 68px; align-items: flex-start; flex-direction: column; justify-content: center; gap: 10px; padding: 14px 0; }
            .nav-links { gap: 10px 16px; }
            main { padding-top: 42px; }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <nav class="nav" aria-label="Navigasi utama">
            <a class="brand" href="{{ route('home') }}">Hikma Town</a>
            <div class="nav-links">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('product') }}">Product</a>
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
                <a href="{{ route('kalkulator.segitiga') }}">Kalkulator</a>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="site-footer">Pencarian dan penjelasan mudah dilakukan disini.</footer>
</body>
</html>
