<?php

namespace App\Http\Controllers;

use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::published()
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('announcements.index', compact('announcements'));
    }

    public function show(Announcement $announcement)
    {
        // 未公開のお知らせは404にする
        abort_unless($announcement->is_published, 404);

        return view('announcements.show', compact('announcement'));
    }
}