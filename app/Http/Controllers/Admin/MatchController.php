<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Player;
use App\Models\Stage;
use App\Models\Tmatch;

class MatchController extends Controller
{
    public function index()
    {
        $matches = Tmatch::with(['stage', 'player1', 'player2'])->get();
        $stages = Stage::all();
        $players = Player::all();

        return view('admin.match.index', compact('matches', 'stages', 'players'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'match_number' => 'required|integer',
            'stage_id' => 'required|exists:stages,id',
            'player1_id' => 'nullable|exists:players,id',
            'player2_id' => 'nullable|exists:players,id|different:player1_id',
            'match_datetime' => 'nullable|date',
            'match_url' => 'nullable|url',
        ]);

        Tmatch::create($request->all());

        return redirect()->route('admin.match.index')->with('success', 'Match added successfully!');
    }

    public function destroy($id)
    {
        $match = Tmatch::findOrFail($id);
        $match->delete();

        return redirect()->route('admin.match.index')->with('success', 'Match deleted successfully!');
    }
    
    public function edit($id)
    {
        $match = Tmatch::findOrFail($id);
        $players = Player::all();
        $stages = Stage::all();

        return view('admin.match.edit', compact('match', 'players', 'stages'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'match_number' => 'required|integer',
            'player1_id' => 'nullable|exists:players,id',
            'player2_id' => 'nullable|exists:players,id',
            'match_datetime' => 'nullable|date',
            'player1_score' => 'nullable|integer|min:0',
            'player2_score' => 'nullable|integer|min:0',
            'match_url' => 'nullable|url',
        ]);

        $match = Tmatch::findOrFail($id);

        $match->update([
            'match_number' => $request->match_number,
            'player1_id' => $request->player1_id,
            'player2_id' => $request->player2_id,
            'match_datetime' => $request->match_datetime,
            'player1_score' => $request->player1_score,
            'player2_score' => $request->player2_score,
            'match_url' => $request->match_url,
        ]);

        return redirect()->route('admin.match.index')->with('success', 'Match updated successfully!');
    }

}
