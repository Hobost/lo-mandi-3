@extends('layout.admin')
@section('title', 'Mappool Manager')
@section('content')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/mods.css') }}">
@endsection
<div class="container mt-4">
    <h1 class="text-center mb-4">Manage Mappools</h1>

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <!-- Add map-->
    <div class="card mb-4">
        <div class="card-header">
            Add Mappool Entry
        </div>
        <div class="card-body">
            <form action="{{ route('admin.mappool.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="stage_id" class="form-label">Select Stage</label>
                    <select name="stage_id" id="stage_id" class="form-select" required>
                        <option value="" selected disabled>Select a stage</option>
                        @foreach($stages as $stage)
                            <option value="{{ $stage->id }}">{{ $stage->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="beatmap_id" class="form-label">Beatmap ID</label>
                    <input type="number" name="beatmap_id" id="beatmap_id" class="form-control" placeholder="Enter beatmap ID, ex '4626647', the end of https://osu.ppy.sh/beatmapsets/2188075#osu/4626647" required>
                </div>
                <div class="mb-3">
                    <label for="mod_id" class="form-label">Mod ID</label>
                    <input type="text" name="mod_id" id="mod_id" class="form-control" placeholder="Enter mod (e.g., HD1, DT2)" required>
                </div>
                <button type="submit" class="btn btn-primary">Add to Mappool</button>
            </form>
        </div>
    </div>
<!-- Existing maps -->
    <div class="card">
        <div class="card-header">
            Existing Mappools
        </div>
        <div class="card-body">
            @foreach($stages as $stage)
                <h5 class="mt-4">{{ $stage->name }}</h5>
                <ul class="list-group mb-4">
                    <!-- why did i name it mappool> lol -->
                    @foreach($mappools->where('stage_id', $stage->id) as $mappool)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <span 
                                    class="badge 
                                        @if(Str::startsWith($mappool->mod_id, 'NM')) badge-nm
                                        @elseif(Str::startsWith($mappool->mod_id, 'HD')) badge-hd
                                        @elseif(Str::startsWith($mappool->mod_id, 'HR')) badge-hr
                                        @elseif(Str::startsWith($mappool->mod_id, 'DT')) badge-dt
                                        @elseif(Str::startsWith($mappool->mod_id, 'FM')) badge-fm
                                        @elseif(Str::startsWith($mappool->mod_id, 'TB')) badge-tb
                                        @else badge-default
                                        @endif">
                                    [{{ $mappool->mod_id }}]
                                </span>
                                <a href="https://osu.ppy.sh/beatmapsets/{{ $mappool->beatmapset_id }}#osu/{{ $mappool->beatmap_id }}" 
                                target="_blank" 
                                style="color: inherit; text-decoration: none;">
                                {{ $mappool->artist }} - <strong>{{ $mappool->title }}</strong> [{{ $mappool->version }}] by {{ $mappool->creator }}
                                </a>
                                <br>
                                Base Stats >> <b>SR:</b> {{ $mappool->difficulty_rating }} // <b>BPM:</b> {{ $mappool->bpm }} // <b>CS:</b> {{ $mappool->cs }} // <b>AR:</b> {{ $mappool->ar }} // <b>OD:</b> {{ $mappool->accuracy }}
                            </div>
                            <div class="d-inline-flex">

                            <a href="{{ route('admin.mappool.edit', $mappool->id) }}" class="btn btn-secondary btn-sm">Edit</a>

                            <form action="{{ route('admin.mappool.destroy', $mappool->id) }}" method="POST" style="margin: 0;" onsubmit="return confirm('Are you sure you want to delete this map?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm ms-2">Delete</button>
                            </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endforeach
        </div>
    </div>
</div>
@endsection
