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
        <h1 class="auth-title">Tengeneza akaunti</h1>
        <p class="auth-subtitle">Jaza taarifa zako kujiunga na Tunda</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label class="form-label" for="name">Jina kamili</label>
            <input id="name" type="text" class="form-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Andika jina lako kamili">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="username">Jina la mtumiaji</label>
            <input id="username" type="text" class="form-input @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Chagua jina la mtumiaji">

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="email">Barua pepe</label>
            <input id="email" type="email" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Andika barua pepe yako">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="password">Nenosiri</label>
            <input id="password" type="password" class="form-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Tengeneza nenosiri">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="password-confirm">Thibitisha nenosiri</label>
            <input id="password-confirm" type="password" class="form-input" name="password_confirmation" required autocomplete="new-password" placeholder="Andika nenosiri tena">
        </div>

        <button type="submit" class="auth-btn">Jisajili</button>
    </form>

    <div class="auth-footer">
        Tayari una akaunti? <a href="{{ route('login') }}">Ingia hapa</a>
    </div>
</div>
@endsection
