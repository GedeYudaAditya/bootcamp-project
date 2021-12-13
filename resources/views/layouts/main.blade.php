<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/css/mainStyle.css') }}">

    {{-- data table --}}
    <link rel="stylesheet" type="text/css" href="{{ url('vendor/datatables/dataTables.bootstrap4.min.css') }}">
    <script type="text/javascript" src="{{ url('vendor/ckeditor/ckeditor.js') }}"></script>

    {{-- font aweowsem --}}
    <script src="https://kit.fontawesome.com/0a6af26e86.js" crossorigin="anonymous"></script>
    <script src="{{ url('js/script.js') }}"></script>
    <script src="{{ url('js/jquery-3.6.0.slim.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- teks form editor --}}
    <script src="https://cdn.tiny.cloud/1/uui0b79sdik1s8twzzfs49fztv86neopbymlc1wig7cfvbm4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>
    <script>
      tinymce.init({
        selector: 'textarea#editor',
        menubar: false
      });
    </script>
    <title>Road to Bali | {{ $title }}</title>
  </head>
  <body>
    <div class="back">
    <div class="bg">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img src="/img/logo.png" alt="logo" width="30" height="24" class="d-inline-block align-text-top">
            Road to Bali
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link {{ ( $title == 'Home' ) ? 'active' : '' }}" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ ( $title == 'Nature Tourism' ) ? 'active' : '' }}" href="/nature">Nature Destination</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ ( $title == 'Culture Tourism' ) ? 'active' : '' }}" href="/culture">Culture Destination</a>
              </li>
            </ul>

            <ul class="navbar-nav ms-auto">
              @auth
                @if (Auth::user()->kategoriAkun == 'guide')
                  <li class="nav-item">
                    <a class="nav-link {{ ( $title == 'Create Destination' ) ? 'active' : '' }}" href="/dashboard">+ Edit & Create Destination</a>
                  </li>
                @endif
                  <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle {{ ( $title == 'Account' ) ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <strong>[{{ Auth::user()->name }}]</strong>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item text-center" href="/account"> <i class="fa fa-user"></i> Account</a></li>
                    <li><a class="dropdown-item text-center" href="/ticket"> <i class="fa fa-ticket"></i> Your Ticket</a></li>
                    <form action="{{ route('logout') }}" method="POST">
                      @csrf
                      <button type="submit" class="dropdown-item"><i class="fa fa-sign-out"></i> Logout</button>
                    </form>
                  </ul>
                </li>
              @else
                
                <li class="nav-item">
                  <a class="nav-link {{ ( $title == 'Login' ) ? 'active' : '' }}" href="/login">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ ( $title == 'Registrasi' ) ? 'active' : '' }}" href="/registration">Sign-in</a>
                </li>
              @endauth
            </ul>
          </div>
        </div>
      </nav>
    <div class="container page">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <footer class="d-flex align-items-center justify-content-center">
      <p>Build with <i class="fa fa-heart"></i> by Team 7</p>
    </footer>
  </div>
  </div>
  <script src="{{ url('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ url('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ url('js/demo/datatables-demo.js') }}"></script>
  </body>
</html>