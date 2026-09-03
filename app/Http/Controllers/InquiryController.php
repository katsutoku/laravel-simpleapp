<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInquiryRequest;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function create()
    {
        return view('inquiries.create');
    }

    public function store(StoreInquiryRequest $request)
    {
        $user = $request->user();

        Inquiry::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'subject' => $request->subject,
            'body' => $request->body,
        ]);

        return redirect()
            ->route('mypage')
            ->with('status', 'inquiry-sent');
    }
}