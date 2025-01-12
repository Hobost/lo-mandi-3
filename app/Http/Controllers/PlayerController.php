<?php

namespace App\Http\Controllers;

use App\Services\OsuApiService;
use App\Services\PlayerService;

use App\Models\Player;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::orderBy('rank', 'asc')->paginate(6); // pagination to show 10 players per page
        return view('players', compact('players'));
    }
}
