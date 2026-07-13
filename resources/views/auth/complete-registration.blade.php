@extends('layouts.auth')

@section('content')
<div class="auth-card" style="max-width:520px;">
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
        <h1 class="auth-title">Kamilisha usajili</h1>
        <p class="auth-subtitle">Chagua aina ya akaunti na jaza taarifa zilizobaki</p>
    </div>

    <form method="POST" action="{{ route('registration.complete') }}" id="completion-form">
        @csrf

        <div class="form-group">
            <label class="form-label">Aina ya akaunti</label>
            <div class="role-options">
                <label class="role-card" id="role-user">
                    <input type="radio" name="role" value="user" checked>
                    <span class="role-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </span>
                    <span class="role-text">
                        <strong>Mtumiaji wa kawaida</strong>
                        <small>Tafuta au chapisha matunda</small>
                    </span>
                </label>
                <label class="role-card" id="role-mate">
                    <input type="radio" name="role" value="mate_finder">
                    <span class="role-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </span>
                    <span class="role-text">
                        <strong>Mate Finder</strong>
                        <small>Thibitisha kwa namba ya simu</small>
                    </span>
                </label>
            </div>
            @error('role')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div id="user-fields">
            <div class="form-group">
                <label class="form-label" for="mkoa">Mkoa</label>
                <select id="mkoa" name="mkoa" class="form-input">
                    <option value="" disabled selected>Chagua mkoa</option>
                    <option value="Arusha">Arusha</option>
                    <option value="Dar es Salaam">Dar es Salaam</option>
                    <option value="Dodoma">Dodoma</option>
                    <option value="Geita">Geita</option>
                    <option value="Iringa">Iringa</option>
                    <option value="Kagera">Kagera</option>
                    <option value="Katavi">Katavi</option>
                    <option value="Kigoma">Kigoma</option>
                    <option value="Kilimanjaro">Kilimanjaro</option>
                    <option value="Lindi">Lindi</option>
                    <option value="Manyara">Manyara</option>
                    <option value="Mara">Mara</option>
                    <option value="Mbeya">Mbeya</option>
                    <option value="Morogoro">Morogoro</option>
                    <option value="Mtwara">Mtwara</option>
                    <option value="Mwanza">Mwanza</option>
                    <option value="Njombe">Njombe</option>
                    <option value="Pemba Kaskazini">Pemba Kaskazini</option>
                    <option value="Pemba Kusini">Pemba Kusini</option>
                    <option value="Pwani">Pwani</option>
                    <option value="Rukwa">Rukwa</option>
                    <option value="Ruvuma">Ruvuma</option>
                    <option value="Shinyanga">Shinyanga</option>
                    <option value="Simiyu">Simiyu</option>
                    <option value="Singida">Singida</option>
                    <option value="Songwe">Songwe</option>
                    <option value="Tabora">Tabora</option>
                    <option value="Tanga">Tanga</option>
                    <option value="Zanzibar Kaskazini">Zanzibar Kaskazini</option>
                    <option value="Zanzibar Kusini">Zanzibar Kusini</option>
                    <option value="Zanzibar Mjini Magharibi">Zanzibar Mjini Magharibi</option>
                </select>
                @error('mkoa')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="wilaya">Wilaya</label>
                <input id="wilaya" type="text" name="wilaya" class="form-input @error('wilaya') is-invalid @enderror" placeholder="Andika wilaya yako" value="{{ old('wilaya') }}">
                @error('wilaya')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <div id="mate-fields" style="display:none;">
            <div class="form-group">
                <label class="form-label" for="phone_number">Namba ya simu</label>
                <input id="phone_number" type="tel" name="phone_number" class="form-input @error('phone_number') is-invalid @enderror" placeholder="Mfano: 0712345678" value="{{ old('phone_number') }}">
                @error('phone_number')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <p class="hint">Tutakutumia namba ya kuthibitisha (OTP) kwa SMS au ujumbe mfupi.</p>
        </div>

        <button type="submit" class="auth-btn" id="submit-btn">Endelea</button>
    </form>
</div>

<style>
    .role-options {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0.75rem;
        margin-top: 0.4rem;
    }
    .role-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.5rem;
        padding: 1rem;
        background: #ffffff;
        border: 2px solid #e2e8f0;
        border-radius: 0.75rem;
        cursor: pointer;
        transition: border-color 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
        text-align: center;
    }
    .role-card:hover {
        border-color: #10b981;
    }
    .role-card input {
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }
    .role-card input:checked + .role-icon {
        color: #10b981;
        background: #ecfdf5;
    }
    .role-card input:checked ~ .role-text strong {
        color: #047857;
    }
    .role-card:has(input:checked) {
        border-color: #10b981;
        background: #f0fdf4;
        box-shadow: 0 0 0 3px rgba(16,185,129,0.12);
    }
    .role-icon {
        width: 2.5rem;
        height: 2.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 0.5rem;
        background: #f8fafc;
        color: #64748b;
        transition: all 0.2s ease;
    }
    .role-icon svg {
        width: 1.25rem;
        height: 1.25rem;
    }
    .role-text {
        display: flex;
        flex-direction: column;
        gap: 0.15rem;
    }
    .role-text strong {
        font-size: 0.9rem;
        font-weight: 600;
        color: #1e293b;
    }
    .role-text small {
        font-size: 0.75rem;
        color: #64748b;
    }
    .hint {
        font-size: 0.8rem;
        color: #64748b;
        margin: -0.75rem 0 1.25rem;
    }
    @media (max-width: 480px) {
        .role-options { grid-template-columns: 1fr; }
    }
</style>

<script>
    const roleUser = document.getElementById('role-user');
    const roleMate = document.getElementById('role-mate');
    const userFields = document.getElementById('user-fields');
    const mateFields = document.getElementById('mate-fields');
    const submitBtn = document.getElementById('submit-btn');

    function toggleFields() {
        const isUser = roleUser.querySelector('input').checked;
        userFields.style.display = isUser ? 'block' : 'none';
        mateFields.style.display = isUser ? 'none' : 'block';
        submitBtn.textContent = isUser ? 'Malizia Usajili' : 'Tuma OTP';
    }

    roleUser.addEventListener('change', toggleFields);
    roleMate.addEventListener('change', toggleFields);
    toggleFields();
</script>
@endsection
