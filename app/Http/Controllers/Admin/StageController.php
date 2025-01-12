<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Stage;

class StageController extends AdminController
{
    public function index()
    {
        $stages = Stage::all();
        return view('admin.stage.index', compact('stages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Stage::create(['name' => $request->name]);
        return redirect()->route('admin.stage.index')->with('success', 'Stage added successfully!');
    }

    public function edit($id)
    {
        $stage = Stage::findOrFail($id);
        return view('admin.stage.edit', compact('stage'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $stage = Stage::findOrFail($id);
        $stage->update(['name' => $request->name]);

        return redirect()->route('admin.stage.index')->with('success', 'Stage updated successfully!');
    }

    public function destroy($id)
    {
        $stage = Stage::findOrFail($id);
        $stage->delete();
        return redirect()->route('admin.stage.index')->with('success', 'Stage deleted successfully!');
    }
}
