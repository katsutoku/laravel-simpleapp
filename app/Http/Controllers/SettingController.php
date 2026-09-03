<?php

namespace App\Http\Controllers;

use App\Models\UserSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit(Request $request)
    {
        $setting = UserSetting::firstOrCreate(
            ['user_id' => $request->user()->id],
            ['notify_email' => true]
        );

        return view('settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'notify_email' => ['nullable', 'boolean'],
        ]);

        $setting = UserSetting::firstOrCreate(
            ['user_id' => $request->user()->id]
        );

        $setting->update([
            'notify_email' => $request->boolean('notify_email'),
        ]);

        return redirect()
            ->route('settings.edit')
            ->with('status', 'settings-updated');
    }
}