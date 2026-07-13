<a href="{{ route('videos.show', $video) }}" class="video-card">
    <div class="video-card-header">
        <h3 class="video-title">{{ $video->title }}</h3>
        @if($video->type === 'vip')
            <span class="vip-badge">VIP</span>
        @endif
    </div>
    <div class="video-thumb">
        <img src="{{ $video->thumbnail_url }}" alt="{{ $video->title }}" loading="lazy">
        <div class="video-play">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
        </div>
    </div>
    <div class="video-footer">
        <div class="counter">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="m21 15-5-5L5 21"/></svg>
            <span>{{ number_format($video->photos_count) }} Pics</span>
        </div>
        <div class="counter">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m22 8-6.5 6.5a2.12 2.12 0 0 1-3 0L6 3a2.12 2.12 0 0 0-3 0L1 5l9 9 6.5-6.5a2.12 2.12 0 0 1 3 0L23 15a2.12 2.12 0 0 1 0 3Z"/></svg>
            <span>{{ number_format($video->videos_count) }} Videos</span>
        </div>
    </div>
</a>
