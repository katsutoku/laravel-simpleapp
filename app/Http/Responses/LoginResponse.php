<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();

        $redirectTo = $user->is_admin
            ? route('admin.dashboard')
            : route('mypage');

        return redirect()->intended($redirectTo);
    }
}