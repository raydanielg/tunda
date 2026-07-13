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
        <h1 class="auth-title">Thibitisha barua pepe</h1>
        <p class="auth-subtitle">Angalia barua pepe yako kwa kiungo cha kuthibitisha</p>
    </div>

    @if (session('resent'))
        <div class="alert-success" style="margin-bottom:1rem;padding:0.75rem 1rem;background:#dcfce7;color:#166534;border-radius:0.5rem;font-size:0.875rem;">
            Kiungo kipya kimewasilishwa kwenye anwani yako ya barua pepe.
        </div>
    @endif

    <p style="text-align:center;color:#64748b;font-size:0.95rem;line-height:1.6;margin:0 0 1.5rem;">
        Kabla ya kuendelea, tafadhali angalia barua pepe yako kwa kiungo cha kuthibitisha.<br>
        Ikiwa hujapokea barua pepe,
    </p>

    <form method="POST" action="{{ route('verification.resend') }}" style="text-align:center;">
        @csrf
        <button type="submit" class="auth-btn" style="width:auto;padding-left:1.5rem;padding-right:1.5rem;">Bonyeza hapa kutuma nyingine</button>.
    </form>
</div>
@endsection
