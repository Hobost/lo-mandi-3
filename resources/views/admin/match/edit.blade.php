@extends('layout.admin')
@section('title', 'Edit Match')
@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Edit Match</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.match.update', $match->id) }}" method="POST" class="card p-4">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="match_number" class="form-label">Match Number</label>
            <input type="number" name="match_number" id="match_number" class="form-control" value="{{ $match->match_number }}" required>
        </div>

        <div class="mb-3">
            <label for="player1_id" class="form-label">Player 1</label>
            <select name="player1_id" id="player1_id" class="form-select">
                <option value="">Select Player 1</option>
                @foreach($players as $player)
                    <option value="{{ $player->id }}" {{ $match->player1_id == $player->id ? 'selected' : '' }}>
                        {{ $player->username }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="player2_id" class="form-label">Player 2</label>
            <select name="player2_id" id="player2_id" class="form-select">
                <option value="">Select Player 2</option>
                @foreach($players as $player)
                    <option value="{{ $player->id }}" {{ $match->player2_id == $player->id ? 'selected' : '' }}>
                        {{ $player->username }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="match_datetime" class="form-label">Match Date & Time</label>
            <input type="datetime-local" name="match_datetime" id="match_datetime" class="form-control" value="{{ $match->match_datetime ? \Carbon\Carbon::parse($match->match_datetime)->format('Y-m-d\TH:i') : '' }}">
        </div>

        <div class="mb-3">
            <label for="player1_score" class="form-label">Player 1 Score</label>
            <input type="number" name="player1_score" id="player1_score" class="form-control" value="{{ $match->player1_score }}">
        </div>

        <div class="mb-3">
            <label for="player2_score" class="form-label">Player 2 Score</label>
            <input type="number" name="player2_score" id="player2_score" class="form-control" value="{{ $match->player2_score }}">
        </div>

        <div class="mb-3">
            <label for="match_url" class="form-label">Match URL</label>
            <input type="url" name="match_url" id="match_url" class="form-control" value="{{ $match->match_url }}">
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.match.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>
</div>
@endsection
