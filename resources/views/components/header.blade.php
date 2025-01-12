<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <style>

    .navbar {
    background-color: #bf88d5 !important; 
    }

    .navbar-collapse {
    flex-grow: 1;
    }

    .navbar-brand {
    position: absolute;
    left: 1rem; 
    top: 50%;
    transform: translateY(-50%);
    }

    .navbar-nav {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    }

    .navbar .ms-auto {
    margin-left: auto !important;
    }

    .nav-link {
        font-family: 'Plus Jakarta Sans', Arial, sans-serif;
        color: #000000;
    }

    .btn-primary {
    background-color: #f5cf96;
    border: none; 
    }

    .btn-primary:hover {
        background-color:#e3bf8b;
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-logo" href="{{ route('home') }}">
            <img src="{{ asset('mandi.png') }}" alt="Logo" 
                 style="height: 40px; width: 40px; object-fit: cover; border-radius: 50%;">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0" style="margin: 0 auto;">

                {{-- <!-- href disesuaikan disini --> --}}
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('mappools') }}">Mappools</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('players') }}">Players</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('schedules') }}">Schedues</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('info') }}">Info</a>
              </li> 
            </ul>
          </div>
          <div class="d-flex ms-auto align-items-center">
          <a href="{{ route('admin.index') }}" class="btn btn-primary me-2">Admin</a> 
          
          @auth
            <div class="dropdown">
              <a href="#" class="d-flex align-items-center text-decoration-none" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ Auth::user()->profile_pic_url }}" alt="Profile Picture" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
                </form>
              </ul>
            </div>
          @endauth
        </div>
        </div>
      </nav>
</body>
    <script></script>
</html> 