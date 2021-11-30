<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/authStyle.css">
    <script src="https://kit.fontawesome.com/0a6af26e86.js" crossorigin="anonymous"></script>
    <title>Road to Bali | {{ $title }}</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <img src="img/logo.png" alt="logo">
        <a class="navbar-brand" href="#"><b>Road to Bali</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ ( $title == 'Login' ) ? 'active' : '' }}" href="/login">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ( $title == 'Registrasi' ) ? 'active' : '' }}" href="/registration">Sign-in</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ( $title == 'Tentang' ) ? 'active' : '' }}" href="/tentang">Tentang</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container mt-4">
        <br>
        <br>
        @yield('content')
    </div>

    <footer class="d-flex align-items-center justify-content-center">
      <p>Build with <i class="fa fa-heart"></i> by Team 7</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>