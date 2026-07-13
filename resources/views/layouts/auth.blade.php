<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tunda') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --tunda-green: #10b981;
            --tunda-green-dark: #047857;
            --tunda-bg: #f8fafc;
            --tunda-text: #1e293b;
            --tunda-muted: #64748b;
            --tunda-border: #e2e8f0;
            --tunda-card: #ffffff;
        }

        * {
            box-sizing: border-box;
        }

        html, body {
            margin: 0;
            padding: 0;
            min-height: 100%;
            font-family: 'Inter', ui-sans-serif, system-ui, sans-serif;
            background: var(--tunda-bg);
            color: var(--tunda-text);
        }

        .auth-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        .auth-card {
            width: 100%;
            max-width: 420px;
            background: var(--tunda-card);
            border-radius: 1.25rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 10px 15px -3px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--tunda-border);
            padding: 2.5rem;
        }

        .auth-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .auth-logo {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--tunda-green-dark);
            text-decoration: none;
            margin-bottom: 1rem;
        }

        .auth-logo svg {
            width: 2rem;
            height: 2rem;
        }

        .auth-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin: 0 0 0.35rem;
        }

        .auth-subtitle {
            font-size: 0.9rem;
            color: var(--tunda-muted);
            margin: 0;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.4rem;
            color: var(--tunda-text);
        }

        .form-input {
            width: 100%;
            padding: 0.65rem 0.9rem;
            font-size: 0.95rem;
            font-family: inherit;
            color: var(--tunda-text);
            background: #ffffff;
            border: 1px solid var(--tunda-border);
            border-radius: 0.6rem;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-input:focus {
            border-color: var(--tunda-green);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.12);
        }

        .form-input.is-invalid {
            border-color: #ef4444;
        }

        .invalid-feedback {
            display: block;
            margin-top: 0.35rem;
            font-size: 0.8rem;
            color: #ef4444;
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.25rem;
        }

        .form-check-input {
            width: 1rem;
            height: 1rem;
            accent-color: var(--tunda-green);
            cursor: pointer;
        }

        .form-check-label {
            font-size: 0.875rem;
            color: var(--tunda-muted);
            cursor: pointer;
        }

        .auth-btn {
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            font-weight: 600;
            font-family: inherit;
            color: #ffffff;
            background: var(--tunda-green);
            border: none;
            border-radius: 0.6rem;
            cursor: pointer;
            transition: background 0.2s ease, transform 0.1s ease;
        }

        .auth-btn:hover {
            background: var(--tunda-green-dark);
        }

        .auth-btn:active {
            transform: scale(0.99);
        }

        .auth-footer {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.875rem;
            color: var(--tunda-muted);
        }

        .auth-footer a {
            color: var(--tunda-green-dark);
            font-weight: 500;
            text-decoration: none;
        }

        .auth-footer a:hover {
            text-decoration: underline;
        }

        .auth-links {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1rem;
        }

        .auth-links a {
            font-size: 0.85rem;
            color: var(--tunda-muted);
            text-decoration: none;
        }

        .auth-links a:hover {
            color: var(--tunda-green-dark);
        }
    </style>
</head>
<body>
    <div class="auth-page">
        @yield('content')
    </div>
</body>
</html>
