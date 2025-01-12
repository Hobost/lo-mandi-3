@extends('layout.app')
@section('title', '- Schedule')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/hover.css') }}">
<link rel="stylesheet" href="{{ asset('css/mappool.css') }}">
@endsection
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <form method="POST" action="{{ route('schedules.changeStage') }}">
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
            <h2>{{ $currentStage ? $currentStage->name : 'Schedule' }}</h2>
            @if($matches && $matches->isNotEmpty())
                @foreach($matches as $match)
                    <a href="{{ $match->match_url }}" target="_blank" style="text-decoration: none; color: inherit;">
                        <div class="card mt-3">
                            <div class="row g-0">
                                <!-- Details -->
                                <div class="col-md-2 d-flex align-items-center justify-content-center">
                                    <div class="text-center">
                                        <h5 class="mb-1"><strong>Match {{ $match->match_number }}</strong></h5>
                                        <p class="mb-0 text-muted small">
                                            {{ $match->match_datetime 
                                                ? \Carbon\Carbon::parse($match->match_datetime)->format('F d // H:i') 
                                                : 'TBD' }}
                                        </p>
                                    </div>
                                </div>

                                <!-- VS -->
                                <div class="col-md-10">
                                    <div class="card-body d-flex align-items-center justify-content-between" style="background-color:#fff1fb">
                                        <div class="d-flex align-items-center" >
                                            <img src="{{ $match->player1->profile_pic_url }}" alt="{{ $match->player1->username }}" 
                                                class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
                                            <div>
                                                <h6 class="mb-0"><strong>{{ $match->player1->username }}</strong></h6>
                                                <p class="mb-0 text-muted small">Rank: #{{ $match->player1->rank ?? 'N/A' }}</p>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <h5 class="mb-0">
                                                {{ $match->player1_score ?? '-' }} - {{ $match->player2_score ?? '-' }}
                                            </h5>
                                        </div>

                                        <div class="d-flex align-items-center">
                                            <div class="text-end" style="margin-right: 10px;">
                                                <h6 class="mb-0"><strong>{{ $match->player2->username }}</strong></h6>
                                                <p class="mb-0 text-muted small">Rank: #{{ $match->player2->rank ?? 'N/A' }}</p>
                                            </div>
                                            <img src="{{ $match->player2->profile_pic_url }}" alt="{{ $match->player2->username }}" 
                                                class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach

            @else
                <p>No matches found for this stage.</p>
            @endif
        </div>
    </div>
</div>
@endsection
