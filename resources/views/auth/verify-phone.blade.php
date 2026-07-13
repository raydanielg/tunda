@extends('layouts.auth')

@section('content')
<div class="auth-card" style="max-width:420px;">
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
        <h1 class="auth-title">Thibitisha namba yako</h1>
        <p class="auth-subtitle">Weka namba 6 za kuthibitisha zilizotumwa kwa simu yako</p>
    </div>

    <div class="phone-hint">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.3 12.3 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.3 12.3 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        <span>{{ session('registration_pending_phone') }}</span>
    </div>

    <form method="POST" action="{{ route('registration.verify.phone') }}">
        @csrf

        <div class="form-group">
            <label class="form-label" for="verification_code">Namba ya kuthibitisha</label>
            <input id="verification_code" type="text" name="verification_code" class="form-input @error('verification_code') is-invalid @enderror" maxlength="6" placeholder="000000" required autocomplete="off" inputmode="numeric">
            @error('verification_code')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <button type="submit" class="auth-btn">Thibitisha na Enda kwa Dashboard</button>
    </form>

    <div class="auth-footer">
        Hujapokea OTP? <a href="{{ route('register') }}">Anza upya</a>
    </div>
</div>

<style>
    .phone-hint {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
        padding: 0.75rem 1rem;
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        border-radius: 0.75rem;
        color: #047857;
        font-weight: 500;
        font-size: 0.95rem;
    }
    .phone-hint svg {
        width: 1.1rem;
        height: 1.1rem;
    }
    #verification_code {
        text-align: center;
        letter-spacing: 0.5rem;
        font-size: 1.5rem;
        font-weight: 700;
        padding: 0.85rem 1rem;
    }
</style>

<script>
    const codeInput = document.getElementById('verification_code');
    codeInput.addEventListener('input', function(e) {
        e.target.value = e.target.value.replace(/\D/g, '').substring(0, 6);
    });
</script>
@endsection
