@extends('layout.admin')
@section('title', 'Edit Map')
@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Edit Mappool</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.mappool.update', $mappool->id) }}" method="POST" class="card p-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="beatmap_id" class="form-label">Beatmap ID</label>
            <input type="text" class="form-control" id="beatmap_id" name="beatmap_id" value="{{ old('beatmap_id', $mappool->beatmap_id) }}" required>
        </div>

        <div class="mb-3">
            <label for="mod_id" class="form-label">Mod ID</label>
            <input type="text" class="form-control" id="mod_id" name="mod_id" value="{{ old('mod_id', $mappool->mod_id) }}" required>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.stage.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>
</div>
@endsection
