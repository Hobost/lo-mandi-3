<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\Beatmap;

class MappoolController extends Controller
{
    public function index()
    {
        $stages = Stage::all();

        $selectedStageId = session('stage_id') ?? ($stages->isNotEmpty() ? $stages->first()->id : null);
        $currentStage = $selectedStageId ? Stage::findOrFail($selectedStageId) : null;

        $maps = $selectedStageId ? Stage::findOrFail($selectedStageId)->maps : null;

        return view('mappools', compact('stages', 'maps', 'selectedStageId', 'currentStage'));
    }

    public function changeStage()
    {
        session(['stage_id' => request('stage_id')]);

        return redirect()->route('mappools');
    }

}
