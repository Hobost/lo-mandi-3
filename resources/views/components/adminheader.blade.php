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
          <a class="navbar-logo" href="{{ route('admin.index') }}">
            <img src="{{ asset('mandi.png') }}" alt="Logo" style="height: 40px; width: auto;">
        </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0" style="margin: 0 auto;">

                <!-- href disesuaikan disini -->
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('admin.stage.index') }}">Stages</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('admin.mappool.index') }}">Mappools</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('admin.player.index') }}">Players</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('admin.match.index') }}">Matches</a>
              </li>
            </ul>
          </div>
          <div class="d-flex ms-auto align-items-center">
          <a href="{{ route('home') }}" class="btn btn-primary me-2">Main</a> 
            @if (Auth::guard('admin')->check())
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="adminMenu" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ session('admin_username', 'Admin') }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminMenu">
                      <form action="{{ route('admin.logout') }}" method="POST">
                          @csrf
                          <button type="submit" class="dropdown-item">Logout</button>
                      </form>
                </ul>
              </div>
            @endif
        </div>
        </div>
      </nav>
</body>
    <script></script>
</html> 