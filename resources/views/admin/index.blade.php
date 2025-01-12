@extends('layout.admin')
@section('content')

<div class="container mt-4">
    
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
    <h1 class="text-center mb-4">Admin Dashboard</h1>
    <h3 class="text-center mb-4">(admin registration is public so my lecturer can see the pages</h3>
        <h3 class="text-center mb-4">
         if you find this somehow please dont abuse my api key :(((~ )</h3>
    <br>
    <div class="container mt-4">
        <div class="row g-4">
            <div class="col-md-6">
                <a href="{{ route('admin.stage.index') }}" style="text-decoration: none;">
                    <div class="card h-00" style="background: linear-gradient(135deg, #6a11cb, #d525fc); color: white;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Manage Stages</h5>
                        </div>
                    </div>
                </a>
            </div>
    
            <div class="col-md-6">
                <a href="{{ route('admin.player.index') }}" style="text-decoration: none;">
                    <div class="card h-100" style="background: linear-gradient(135deg, #ff745f, #feb47b); color: white;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Manage Players</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    
        <div class="row g-4 mt-3">
            <div class="col-md-6">
                <a href="{{ route('admin.mappool.index') }}" style="text-decoration: none;">
                    <div class="card h-100" style="background: linear-gradient(135deg, #00c6ff, #0072ff); color: white;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Manage Mappools</h5>
                        </div>
                    </div>
                </a>
            </div>
    
            <div class="col-md-6">
                <a href="{{ route('admin.match.index') }}" style="text-decoration: none;">
                    <div class="card h-100" style="background: linear-gradient(135deg, #11998e, #38ef7d); color: white;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Manage Matches</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    
    
</div>
@endsection