@extends('layout.admin')
@section('title', 'Edit Stage')
@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Edit Stage</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.stage.update', $stage->id) }}" method="POST" class="card p-4">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Stage Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $stage->name }}" required>
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.stage.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>
</div>
@endsection
