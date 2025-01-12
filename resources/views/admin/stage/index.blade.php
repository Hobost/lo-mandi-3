@extends('layout.admin')
@section('title', 'Stage Manager')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Manage Stages</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <div class="card mb-4">
        <div class="card-header">
            Add New Stage
        </div>
        <div class="card-body">
            <form action="{{ route('admin.stage.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Stage Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter stage name" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Stage</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Stages</div>
        <div class="card-body">
            <ul class="list-group px-2">
                @foreach($stages as $stage)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $stage->name }}
                        <div class="d-inline-flex">
                        <a href="{{ route('admin.stage.edit', $stage->id) }}" class="btn btn-secondary btn-sm">Edit</a>

                        <form action="{{ route('admin.stage.destroy', $stage->id) }}" method="POST" style="margin: 0;" onsubmit="return confirm('Are you sure you want to delete this stage?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm ms-2">Delete</button>
                        </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
