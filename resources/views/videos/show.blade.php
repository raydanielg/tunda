@extends('layouts.landing')

@section('content')
<section class="section" style="margin-top:1rem;">
    <div style="background:#fff;border:1px solid #e2e8f0;border-radius:1.25rem;overflow:hidden;">
        <div style="position:relative;background:#000;aspect-ratio:16/9;">
            <video controls poster="{{ $video->thumbnail_url }}" style="width:100%;height:100%;">
                <source src="{{ $video->video_url }}" type="video/mp4">
                Kivinjari chako hakisupport video.
            </video>
        </div>
        <div style="padding:1.5rem;">
            <div style="display:flex;align-items:center;gap:0.5rem;margin-bottom:0.75rem;">
                @if($video->type === 'vip')
                    <span class="badge badge-vip">VIP</span>
                @else
                    <span class="badge badge-regular">Regular</span>
                @endif
                <span style="font-size:0.85rem;color:#64748b;">{{ $video->duration }} &bull; {{ number_format($video->views) }} views &bull; {{ $video->created_at->diffForHumans() }}</span>
            </div>
            <h1 style="font-size:1.75rem;font-weight:800;margin:0 0 0.75rem;">{{ $video->title }}</h1>
            <p style="color:#64748b;line-height:1.6;margin:0;">{{ $video->description }}</p>
        </div>
    </div>

    @if($related->count())
        <h2 style="font-size:1.25rem;font-weight:700;margin:2rem 0 1rem;">Related Videos</h2>
        <div class="video-grid">
            @foreach($related as $video)
                @include('partials.video-card', ['video' => $video])
            @endforeach
        </div>
    @endif
</section>
@endsection
