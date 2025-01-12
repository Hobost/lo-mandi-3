@extends('layout.admin')
@section('title', 'Player Manager')
@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Manage Players</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-header">Manually Add Player</div>
        <div class="card-body">
            <form action="{{ route('admin.player.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="osu_id">osu! User ID</label>
                    <input type="number" name="osu_id" id="osu_id" class="form-control" placeholder="Enter user ID (ex. 7562902 from https://osu.ppy.sh/users/7562902/osu)" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Player</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Players</div>
        <div class="card-body">
            <ul class="list-group">
                @foreach ($players as $player)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <a href="https://osu.ppy.sh/users/{{ $player->osu_id }}/osu" 
                                target="_blank" 
                                style="color: inherit; text-decoration: none;">
                            <strong>{{ $player->username }}</strong> - {{ $player->osu_id }}
                            </a>
                            <br>
                            #{{ $player->rank }} | PP: {{ round($player->pp) }} | Country: {{ $player->country }}
                        </div>
                        <form action="{{ route('admin.player.destroy', $player->id) }}" method="POST" style="margin: 0;" onsubmit="return confirm('Are you sure you want to delete this player?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>



@endsection
