<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Services\BeatmapService;
use Illuminate\Http\Request;

use App\Models\Beatmap;
use App\Models\Stage;

class MappoolController extends Controller
{
    protected $beatmapService;

    public function __construct(BeatmapService $beatmapService)
    {
        $this->beatmapService = $beatmapService;
    }

    public function index()
    {
        $stages = Stage::all();
        $mappools = Beatmap::with('stage')->get();
        return view('admin.mappool.index', compact('stages', 'mappools'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'stage_id' => 'required|exists:stages,id',
            'beatmap_id' => 'required|integer',
            'mod_id' => 'required|string|max:10',
        ]);

        // Fetch and store beatmap data via BeatmapService // Services/BeatmapService.php
        $response = $this->beatmapService->fetchAndStoreBeatmap($request->beatmap_id);

        if (!$response['success']) {
            return redirect()->route('admin.mappool.index')->with('error', $response['message']);
        }

        Beatmap::where('beatmap_id', $request->beatmap_id)->update([
            'mod_id' => $request->mod_id,
            'stage_id' => $request->stage_id,
        ]);

        return redirect()->route('admin.mappool.index')->with('success', 'Map entry added successfully!');
    }

    public function destroy($id)
    {
        $beatmap = Beatmap::findOrFail($id);
        $beatmap->delete();
        return redirect()->route('admin.mappool.index')->with('success', 'Map entry deleted successfully!');
    }

    public function edit($id)
    {
        $mappool = Beatmap::findOrFail($id);
        return view('admin.mappool.edit', compact('mappool'));
    }

    // update new map which deletes old map first to prevent multiple entries
    // not good but will work for now, reminder to rework later
    public function update(Request $request, $id)
    {
        $request->validate([
            'beatmap_id' => 'required|integer',
            'mod_id' => 'required|string|max:10',
        ]);

        $beatmap = Beatmap::findOrFail($id);

        $beatmap->delete();

        $beatmapId = $request->input('beatmap_id');
        $modId = $request->input('mod_id');

        $response = $this->beatmapService->fetchAndStoreBeatmap($request->beatmap_id);

        if ($response['success']) {
            $updatedBeatmap = Beatmap::where('beatmap_id', $beatmapId)->first();
            $updatedBeatmap->mod_id = $modId;
            $updatedBeatmap->stage_id = $beatmap->stage_id;
            $updatedBeatmap->save();

            return redirect()->route('admin.mappool.index')->with('success', 'Map updated successfully!');
        }

        return redirect()->route('admin.mappool.index')->with('error', 'Failed to update map.');
    }


}

