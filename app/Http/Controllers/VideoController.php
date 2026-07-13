<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function landing()
    {
        $featuredVip = Video::vip()->featured()->latest()->take(4)->get();
        $vipVideos = Video::vip()->latest()->take(6)->get();
        $regularVideos = Video::regular()->latest()->take(6)->get();

        return view('welcome', compact('featuredVip', 'vipVideos', 'regularVideos'));
    }

    public function vip()
    {
        $videos = Video::vip()->latest()->paginate(12);

        return view('videos.vip', compact('videos'));
    }

    public function regular()
    {
        $videos = Video::regular()->latest()->paginate(12);

        return view('videos.regular', compact('videos'));
    }

    public function all()
    {
        $videos = Video::latest()->paginate(16);

        return view('videos.all', compact('videos'));
    }

    public function show(Video $video)
    {
        $related = Video::where('type', $video->type)
            ->where('id', '!=', $video->id)
            ->latest()
            ->take(4)
            ->get();

        return view('videos.show', compact('video', 'related'));
    }
}
