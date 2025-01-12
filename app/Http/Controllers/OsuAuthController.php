<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

use App\Models\Player;

class OsuAuthController extends Controller
{
    public function handleCallback()
    {
        $osuUser = Socialite::driver('osu')->user();

        // from osuprovider.php
        $attributes = $osuUser->attributes;

        $player = Player::updateOrCreate(
            ['osu_id' => $attributes['osu_user_id']],
            [
                'username' => $attributes['username'],
                'country' => $attributes['country'] ?? 'Unknown',
                'pp' => $attributes['pp'] ?? 0,
                'rank' => $attributes['rank'] ?? 0,
                'profile_pic_url' => $attributes['avatar_url'],
            ]
        );
        Auth::login($player);

        return redirect()->route('home')->with('success', 'Logged in successfully.');
    
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Logged out successfully.');
    }
}
