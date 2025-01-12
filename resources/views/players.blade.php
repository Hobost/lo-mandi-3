@extends('layout.app')
@section('title', '- Players')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/hover.css') }}">
@endsection

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Players</h1>
    <div class="row">
        @foreach($players as $player)
            <div class="col-md-6 mb-4">
                <a href="https://osu.ppy.sh/users/{{ $player->osu_id }}" target="_blank" style="text-decoration: none; color: inherit;">
                    <div class="card h-100 border-0 shadow rounded-lg d-flex align-items-center justify-content-center" 
                        style="transition: transform 0.2s ease, box-shadow 0.2s ease; min-height: 150px;">
                        <div class="row g-0 align-items-center w-100">
                            <!-- Avatar -->
                            <div class="col-4 text-center">
                                <img src="{{ $player->profile_pic_url }}" alt="{{ $player->username }}" 
                                    class="rounded-circle shadow" 
                                    style="width: 100px; height: 100px; object-fit: cover;">
                            </div>
                            
                            <!-- Details -->
                            <div class="col-8">
                                <div class="card-body text-center">
                                    <h4 class="card-title mb-2" style="font-size: 1.5rem; font-weight: bold;">
                                        {{ $player->username }}
                                    </h4>
                                    <p class="card-text text-muted" style="font-size: 1.2rem;">
                                        #{{ $player->rank }} // {{ round($player->pp) }}pp 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    {{-- Pagination --}}
    <div class="mt-4 d-flex justify-content-center">
        @if ($players->hasPages())
            <ul class="pagination">
                @if ($players->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link" style="color: pink;">&#9664;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $players->previousPageUrl() }}" class="page-link" style="color: pink;">&#9664;</a>
                    </li>
                @endif
    
                @if ($players->hasMorePages())
                    <li class="page-item">
                        <a href="{{ $players->nextPageUrl() }}" class="page-link" style="color: pink;">&#9654;</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link" style="color: pink;">&#9654;</span>
                    </li>
                @endif
            </ul>
        @endif
    </div>
</div>

@endsection