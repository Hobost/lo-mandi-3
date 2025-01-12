@extends('layout.admin')
@section('title', 'Admin Registration')
@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Admin Registration</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.register.post') }}" method="POST" class="p-4 border rounded">
        @csrf
        <div class="form-group mb-3">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Enter username" required>
        </div>
        <div class="form-group mb-3">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
        </div>
        <div class="form-group mb-3">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm password" required>
        </div>
        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </div>
        <p class="text-center">
            Already registered? <a href="{{ route('admin.login') }}">Login here</a>. (Intended to be public)
        </p>
    </form>
</div>
@endsection
