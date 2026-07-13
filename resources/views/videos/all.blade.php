@extends('layouts.landing')

@section('content')
<section class="section" style="margin-top:1rem;">
    <div class="section-header">
        <h2 class="section-title">Explore All Videos</h2>
    </div>
    <div class="video-grid">
        @forelse($videos as $video)
            @include('partials.video-card', ['video' => $video])
        @empty
            <p style="color:#64748b;">Hakuna video kwa sasa.</p>
        @endforelse
    </div>
    <div class="pagination">
        {{ $videos->links() }}
    </div>
</section>
@endsection
