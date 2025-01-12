<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Services\PlayerService;
use Illuminate\Http\Request;

use App\Models\Player;

class PlayerController extends Controller
{
    protected $playerService;

    public function __construct(PlayerService $playerService)
    {
        $this->playerService = $playerService;
    }

    public function index()
    {
        $players = Player::all();
        return view('admin.player.index', compact('players'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'osu_id' => 'required|integer',
        ]);

        $osuId = $request->input('osu_id');

        // this is only for player so the rest have customization
        if (Player::where('osu_id', $osuId)->exists()) {
            return redirect()->route('admin.player.index')->with('error', 'This payer is already registered.');
        }

        $response = $this->playerService->fetchAndStorePlayer($osuId);

        if ($response['success']) {
            return redirect()->route('admin.player.index')->with('success', 'Player added successfully!');
        }

        return redirect()->route('admin.player.index')->with('error', 'Failed to add player.' . $response['message']);
    }

    public function destroy($id)
    {
        $player = Player::findOrFail($id);
        $player->delete();

        return redirect()->route('admin.player.index')->with('success', 'Player deleted successfully!');
    }
}