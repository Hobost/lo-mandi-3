@extends('layout.app')
@section('title')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('css/hover.css') }}"> --}}
@endsection
@section('content')

<div class="container-fluid bg-light py-5">
    <div class="row align-items-center">
        <div class="col-md-6 text-center text-md-start ml-2">
            <h1 class="display-4 fw-bold text-muted">Lo Mandi 3</h1>
            <div class="bg-white p-4 rounded shadow d-inline-block" style="max-width: 500px;">
                <p class="lead mb-3">
                    This is a fake tournament page which aims to showcase Laravel. <br>
                    Register/Login using the button below!
                </p>
                <a href="{{ route('osuLogin') }}" class="btn btn-primary text-white button-color">Login/Register</a>
            </div>
        </div>
        

        <div class="col-md-5 offset-md-1 d-flex justify-content-center">
            <img src="{{ asset('mandi.png') }}" alt="Placeholder Image" 
                 class="img-fluid rounded shadow" 
                 style="width: 300px; height: auto;">
        </div>
    </div>
</div>


<div class="container-fluid py-5">
    <div class="row justify-content-center">
        <div class="col-auto text-center">
            <h1 class="fw-bold mb-4">Other Links (fake) </h1>
        </div>
    </div>
    <div class="d-flex flex-wrap justify-content-center gap-4">
        <div class="card bg-light rounded text-center p-4 shadow" style="width: 300px;">
            <a href="https://osu.ppy.sh/community/forums/topics/1755880?n=1" style="text-decoration: none; color: inherit;">
            <img src="{{ asset('osu.png') }}" alt="Forum Icon" class="img-fluid mb-3" style="width: 50px; height: auto;">
            <h3 class="fw-bold">Forum</h3>
            <p class="text-muted">Forum Thread for the Tournament</p>
            </a>
        </div>
        <div class="card bg-light rounded text-center p-4 shadow" style="width: 300px;">
            <a href="https://discord.gg/bluearchiveglobal" style="text-decoration: none; color: inherit;">
            <img src="{{ asset('discord.png') }}" alt="Discord Icon" class="img-fluid mb-3" style="width: 50px; height: auto;">
            <h3 class="fw-bold">Discord</h3>
            <p class="text-muted">An invite link for our Discord server</p>
            </a>
        </div>
    </div>
</div>

@endsection