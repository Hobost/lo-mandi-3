@extends('layout.app')
@section('title', 'Mappool')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/mappool.css') }}">
<link rel="stylesheet" href="{{ asset('css/mods.css') }}">
<link rel="stylesheet" href="{{ asset('css/hover.css') }}">
@endsection
@section('content')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-3">
            <form method="POST" action="{{ route('mappools.changeStage') }}">
                @csrf
                <ul class="w-100">
                    @foreach($stages as $stage)
                        <li class="list-group-item" 
                            {{ $selectedStageId == $stage->id ? 'selected-stage' : '' }}
                            style="cursor: pointer;">
                            <button type="submit" name="stage_id" value="{{ $stage->id }}" 
                                class="btn btn-link stage-button text-decoration-none text-purple">
                                <strong>{{ $stage->name }}</strong>
                            </button>
                        </li>
                    @endforeach
                </ul>
            </form>
        </div>
        

        <div class="col-md-9">
            <h2>{{ $currentStage ? $currentStage->name : 'Mappool' }}</h2>
            @if($maps && $maps->isNotEmpty())
                @foreach($maps as $map)
                    <a href="https://osu.ppy.sh/beatmaps/{{ $map->beatmap_id }}" target="_blank" style="text-decoration: none; color: inherit;">
                    <div class="card mt-3">
                        <div class="row g-0">
                            <div class="col-md-3">
                                <img 
                                    src="{{ $map->cover_card_url }}" 
                                    class="img-fluid rounded-start" 
                                    alt="Map Cover"
                                    style="object-fit: cover; height: 100%; max-height: 150px; width: 100%;">
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <span 
                                        class="badge 
                                            @if(Str::startsWith($map->mod_id, 'NM')) badge-nm
                                            @elseif(Str::startsWith($map->mod_id, 'HD')) badge-hd
                                            @elseif(Str::startsWith($map->mod_id, 'HR')) badge-hr
                                            @elseif(Str::startsWith($map->mod_id, 'DT')) badge-dt
                                            @elseif(Str::startsWith($map->mod_id, 'FM')) badge-fm
                                            @elseif(Str::startsWith($map->mod_id, 'TB')) badge-tb
                                            @else badge-default
                                            @endif">
                                        [{{ $map->mod_id }}]
                                    </span> {{ $map->artist }} - {{ $map->title }} [{{ $map->version }}]
                                    </h5>
                                    <p class="card-text">
                                        by {{ $map->creator }} | BPM: {{ $map->bpm }} | Length: {{ gmdate('i:s', $map->total_length) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div></a>
                @endforeach
            @else
                <p>No maps found</p>
            @endif
        </div>
    </div>
</div>
@endsection
