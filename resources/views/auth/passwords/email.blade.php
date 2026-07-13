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
        <h1 class="auth-title">Rekebisha nenosiri</h1>
        <p class="auth-subtitle">Tuma kiungo cha kurekebisha nenosiri kwenye barua pepe yako</p>
    </div>

    @if (session('status'))
        <div class="alert-success" style="margin-bottom:1rem;padding:0.75rem 1rem;background:#dcfce7;color:#166534;border-radius:0.5rem;font-size:0.875rem;">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group">
            <label class="form-label" for="email">Barua pepe</label>
            <input id="email" type="email" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Andika barua pepe yako">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="auth-btn">Tuma Kiungo</button>
    </form>

    <div class="auth-footer">
        <a href="{{ route('login') }}">Rudi kwa kuingia</a>
    </div>
</div>
@endsection
