<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Inquiry;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => User::count(),
            'announcements' => Announcement::count(),
            'inquiries_unhandled' => Inquiry::where('status', 'unhandled')->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}