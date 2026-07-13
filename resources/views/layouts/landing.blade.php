<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Tunda') }} - Fresh Videos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --tunda-green: #10b981;
            --tunda-green-dark: #047857;
            --tunda-lime: #84cc16;
            --tunda-orange: #f97316;
            --tunda-dark: #0f172a;
            --tunda-muted: #64748b;
            --tunda-bg: #f8fafc;
            --tunda-card: #ffffff;
            --tunda-border: #e2e8f0;
            --tunda-gold: #f59e0b;
        }
        * { box-sizing: border-box; }
        html, body {
            margin: 0;
            padding: 0;
            min-height: 100%;
            font-family: 'Outfit', ui-sans-serif, system-ui, sans-serif;
            background: var(--tunda-bg);
            color: var(--tunda-dark);
        }
        a { text-decoration: none; color: inherit; }
        .landing-header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(255,255,255,0.92);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--tunda-border);
        }
        .landing-header-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }
        .landing-logo {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 800;
            font-size: 1.5rem;
            color: var(--tunda-green-dark);
            letter-spacing: -0.02em;
        }
        .landing-logo svg { width: 2rem; height: 2rem; }
        .landing-nav {
            display: flex;
            align-items: center;
            gap: 2rem;
        }
        .landing-nav-links {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }
        .landing-nav-links a {
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--tunda-muted);
            transition: color 0.2s ease;
        }
        .landing-nav-links a:hover { color: var(--tunda-green-dark); }
        .landing-nav-links a.active { color: var(--tunda-green-dark); font-weight: 600; }
        .landing-actions {
            display: flex;
            gap: 0.75rem;
            align-items: center;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.55rem 1.25rem;
            border-radius: 9999px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.2s ease;
            border: none;
            cursor: pointer;
        }
        .btn-ghost { background: transparent; color: var(--tunda-dark); }
        .btn-ghost:hover { background: #f1f5f9; }
        .btn-primary {
            background: linear-gradient(135deg, var(--tunda-green) 0%, var(--tunda-green-dark) 100%);
            color: #fff;
            box-shadow: 0 8px 20px -6px rgba(16,185,129,0.4);
        }
        .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 12px 24px -6px rgba(16,185,129,0.45); }
        .btn-gold {
            background: linear-gradient(135deg, #fbbf24 0%, #d97706 100%);
            color: #fff;
            box-shadow: 0 8px 20px -6px rgba(245,158,11,0.4);
        }
        .btn-gold:hover { transform: translateY(-1px); box-shadow: 0 12px 24px -6px rgba(245,158,11,0.45); }
        .landing-main {
            max-width: 1280px;
            margin: 0 auto;
            padding: 2rem 1.5rem 4rem;
        }
        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.25rem;
        }
        .section-title {
            font-size: 1.35rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .section-title .badge {
            font-size: 0.65rem;
            font-weight: 700;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .badge-vip { background: #fef3c7; color: #b45309; }
        .badge-regular { background: #ecfdf5; color: #047857; }
        .view-all {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--tunda-green-dark);
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
        }
        .view-all:hover { text-decoration: underline; }
        .video-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.25rem;
        }
        .video-card {
            display: block;
            background: var(--tunda-card);
            border: 1px solid var(--tunda-border);
            border-radius: 1.25rem;
            overflow: hidden;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .video-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 32px -12px rgba(15,23,42,0.12);
        }
        .video-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1rem 1rem 0.75rem;
        }
        .video-title {
            font-size: 1.1rem;
            font-weight: 700;
            line-height: 1.3;
            margin: 0;
            color: var(--tunda-dark);
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .vip-badge {
            flex-shrink: 0;
            background: linear-gradient(135deg, #fbbf24 0%, #d97706 100%);
            color: #fff;
            font-size: 0.75rem;
            font-weight: 800;
            padding: 0.35rem 0.75rem;
            border-radius: 9999px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            box-shadow: 0 4px 10px -4px rgba(245,158,11,0.4);
        }
        .video-thumb {
            position: relative;
            aspect-ratio: 16 / 9;
            overflow: hidden;
            background: #e2e8f0;
        }
        .video-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .video-card:hover .video-thumb img { transform: scale(1.05); }
        .video-play {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0,0,0,0.25);
            opacity: 0;
            transition: opacity 0.2s ease;
        }
        .video-card:hover .video-play { opacity: 1; }
        .video-play svg {
            width: 3.5rem;
            height: 3.5rem;
            color: #fff;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.3));
        }
        .video-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 0.75rem 1rem 1rem;
        }
        .counter {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--tunda-muted);
        }
        .counter svg {
            width: 1rem;
            height: 1rem;
            color: var(--tunda-green);
        }
        .hero {
            position: relative;
            border-radius: 1.5rem;
            overflow: hidden;
            margin-bottom: 2.5rem;
            background: linear-gradient(135deg, #ecfdf5 0%, #fff7ed 100%);
            border: 1px solid var(--tunda-border);
            padding: 3rem;
            min-height: 320px;
            display: flex;
            align-items: center;
        }
        .hero-content { max-width: 520px; }
        .hero h1 {
            font-size: clamp(2rem, 5vw, 3rem);
            font-weight: 800;
            line-height: 1.1;
            margin: 0 0 1rem;
            background: linear-gradient(135deg, var(--tunda-green-dark) 0%, var(--tunda-green) 50%, var(--tunda-orange) 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        .hero p {
            font-size: 1.1rem;
            color: var(--tunda-muted);
            margin: 0 0 1.5rem;
            line-height: 1.6;
        }
        .section { margin-bottom: 2.5rem; }
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
        }
        .pagination nav { display: flex; }
        .pagination svg { width: 1.25rem; height: 1.25rem; }
        .footer {
            border-top: 1px solid var(--tunda-border);
            padding: 2rem 1.5rem;
            text-align: center;
            color: var(--tunda-muted);
            font-size: 0.9rem;
        }
        .mobile-menu-btn { display: none; }
        @media (max-width: 768px) {
            .landing-nav-links { display: none; }
            .mobile-menu-btn { display: block; background: none; border: none; cursor: pointer; }
            .mobile-menu-btn svg { width: 1.5rem; height: 1.5rem; color: var(--tunda-dark); }
            .hero { padding: 2rem; min-height: auto; }
            .video-body { padding: 0.75rem; }
            .video-title { font-size: 0.85rem; }
            .video-meta { font-size: 0.7rem; }
            .video-duration { font-size: 0.65rem; padding: 0.15rem 0.35rem; }
            .vip-lock { font-size: 0.6rem; padding: 0.15rem 0.35rem; }
        }
    </style>
</head>
<body>
    <header class="landing-header">
        <div class="landing-header-inner">
            <a class="landing-logo" href="{{ url('/') }}">
                <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="20" cy="22" r="15" fill="url(#tundaGrad)"/>
                    <path d="M20 7 Q24 0 30 5 Q22 10 20 7" fill="#166534"/>
                    <defs>
                        <linearGradient id="tundaGrad" x1="5" y1="7" x2="35" y2="37" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#10b981"/>
                            <stop offset="1" stop-color="#f97316"/>
                        </linearGradient>
                    </defs>
                </svg>
                {{ config('app.name', 'Tunda') }}
            </a>
            <nav class="landing-nav">
                <div class="landing-nav-links">
                    <a href="{{ route('landing') }}" class="{{ request()->routeIs('landing') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('videos.vip') }}" class="{{ request()->routeIs('videos.vip') ? 'active' : '' }}">VIP</a>
                    <a href="{{ route('videos.regular') }}" class="{{ request()->routeIs('videos.regular') ? 'active' : '' }}">Regular</a>
                    <a href="{{ route('videos.all') }}" class="{{ request()->routeIs('videos.all') ? 'active' : '' }}">Explore</a>
                </div>
                <div class="landing-actions">
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-primary">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-ghost">Log in</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">Jiunge</a>
                    @endauth
                </div>
            </nav>
            <button class="mobile-menu-btn" aria-label="Open menu">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>
    </header>

    <main class="landing-main">
        @yield('content')
    </main>

    <footer class="footer">
        &copy; {{ date('Y') }} {{ config('app.name', 'Tunda') }}. All rights reserved.
    </footer>
</body>
</html>
