@extends('layout.admin')
@section('title', 'Schedule Manager')
@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Manage Matches</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-header">Add Match</div>
        <div class="card-body">
            <form action="{{ route('admin.match.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="stage_id">Stage</label>
                    <select name="stage_id" id="stage_id" class="form-control" required>
                        <option value="">Select Stage</option>
                        @foreach($stages as $stage)
                            <option value="{{ $stage->id }}">{{ $stage->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="match_number">Match Number</label>
                    <input type="number" name="match_number" id="match_number" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="player1_id">Player 1</label>
                    <select name="player1_id" id="player1_id" class="form-control">
                        <option value="">Select Player</option>
                        @foreach($players as $player)
                            <option value="{{ $player->id }}">{{ $player->username }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="player2_id">Player 2</label>
                    <select name="player2_id" id="player2_id" class="form-control">
                        <option value="">Select Player</option>
                        @foreach($players as $player)
                            <option value="{{ $player->id }}">{{ $player->username }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="match_datetime">Date & Time (WIB)</label>
                    <input type="datetime-local" name="match_datetime" id="match_datetime" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="match_url">MP Link</label>
                    <input type="url" name="match_url" id="match_url" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Add Match</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Matches</div>
        <div class="card-body">
            @foreach($stages as $stage)
                <h5 class="mt-4">{{ $stage->name }}</h5>
                <ul class="list-group mb-4">
                        @foreach($matches->where('stage_id', $stage->id) as $match)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        @if($match->match_url)
                            <a href="{{ $match->match_url }}" target="_blank" style="color: inherit; text-decoration: none; display: block; width: 100%;">
                        @endif
                        Match #{{ $match->match_number }} - {{ $match->player1->username ?? 'TBD' }} vs {{ $match->player2->username ?? 'TBD' }} 
                        <br>
                        Date Time: {{ $match->match_datetime ? \Carbon\Carbon::parse($match->match_datetime)->format('d/m/Y - g:iA') : 'TBD' }}
                        <br>
                        {{ $match->player1_score ?? 'TBD' }} : {{ $match->player2_score ?? 'TBD' }}
                        @if($match->match_url)
                            </a>
                        @endif
                        <div class="d-inline-flex">

                        <a href="{{ route('admin.match.edit', $match->id) }}" class="btn btn-secondary btn-sm">Edit</a>

                        <form action="{{ route('admin.match.destroy', $match->id) }}" method="POST" style="margin: 0;" onsubmit="return confirm('Are you sure you want to delete this match?');">
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