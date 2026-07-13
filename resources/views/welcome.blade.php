@extends('layouts.landing')

@section('content')
<section class="section">
    <div class="section-header">
        <h2 class="section-title">
            VIP Videos
            <span class="badge badge-vip">Premium</span>
        </h2>
        <a href="{{ route('videos.vip') }}" class="view-all">View all <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>
    </div>
    <div class="video-grid">
        @forelse($vipVideos as $video)
            @include('partials.video-card', ['video' => $video])
        @empty
            <p style="color:#64748b;">Hakuna video za VIP kwa sasa.</p>
        @endforelse
    </div>
</section>

<section class="section">
    <div class="section-header">
        <h2 class="section-title">
            Regular Videos
            <span class="badge badge-regular">Free</span>
        </h2>
        <a href="{{ route('videos.regular') }}" class="view-all">View all <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>
    </div>
    <div class="video-grid">
        @forelse($regularVideos as $video)
            @include('partials.video-card', ['video' => $video])
        @empty
            <p style="color:#64748b;">Hakuna video za kawaida kwa sasa.</p>
        @endforelse
    </div>
</section>
@endsection
