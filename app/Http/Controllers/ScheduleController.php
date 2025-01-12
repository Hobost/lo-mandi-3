<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\Tmatch;

class ScheduleController extends Controller
{
    public function index()
    {
        $stages = Stage::all();

        $selectedStageId = session('stage_id') ?? ($stages->isNotEmpty() ? $stages->first()->id : null);
        $currentStage = $selectedStageId ? Stage::findOrFail($selectedStageId) : null;

        $matches = $selectedStageId ? Stage::findOrFail($selectedStageId)->matches : null;

        return view('schedules', compact('stages', 'matches', 'selectedStageId', 'currentStage'));
    }

    public function changeStage()
    {
        session(['stage_id' => request('stage_id')]);

        return redirect()->route('schedules');
    }
}
