@extends('layouts.auth')

@section('content')
<div class="auth-card">
    <div class="auth-header">
        <a class="auth-logo" href="{{ url('/') }}">
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
        <h1 class="auth-title">Karibu tena</h1>
        <p class="auth-subtitle">Ingia kwa kutumia jina la mtumiaji na nenosiri lako</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label class="form-label" for="username">Jina la mtumiaji</label>
            <input id="username" type="text" class="form-input @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Andika jina lako">

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="password">Nenosiri</label>
            <input id="password" type="password" class="form-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Andika nenosiri lako">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">Nikumbuke</label>
        </div>

        <button type="submit" class="auth-btn">Ingia</button>

        <div class="auth-links">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Umesahau nenosiri?</a>
            @endif
        </div>
    </form>

    <div class="auth-footer">
        Huna akaunti? <a href="{{ route('register') }}">Jisajili sasa</a>
    </div>
</div>
@endsection
