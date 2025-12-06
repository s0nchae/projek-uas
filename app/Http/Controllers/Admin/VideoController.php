<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::all();
        return view('admin.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.videos.create');
    }

    /**
     * Ekstrak ID video youtube dari link youtube apapun
     */
    private function extractYoutubeId($link)
    {
        preg_match(
            '/(?:v=|youtu\.be\/|embed\/)([a-zA-Z0-9_-]{11})/',
            $link,
            $matches
        );

        return $matches[1] ?? null;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'youtube_link' => 'required|url',
        ]);

        // Ekstrak ID youtube
        $youtubeId = $this->extractYoutubeId($request->youtube_link);

        Video::create([
            'youtube_link' => $request->youtube_link,
            'youtube_id' => $youtubeId,
        ]);

        return redirect()
            ->route('admin.videos.index')
            ->with('success', 'Video berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([
            'youtube_link' => 'required|url',
        ]);

        //Untuk ekstrak ID youtube lagi pas mau update
        $youtubeId = $this->extractYoutubeId($request->youtube_link);

        $video->update([
            'youtube_link' => $request->youtube_link,
            'youtube_id'   => $youtubeId,
        ]);

        return redirect()
            ->route('admin.videos.index')
            ->with('success', 'Video berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()
            ->route('admin.videos.index')
            ->with('success', 'Video berhasil dihapus.');
    }
}
