<!doctype html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/estilos.css">

  <style>
    body {
      background-color: #EDE4DB;
    }
  </style>

  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #B43C3C;">

    <div class="col-2">
      <a class="navbar-brand" style="font-size: 30px; font-weight: bold;" href="/">Vinyl Oasis</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="col-7">
      <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link mr-3" href="/">Inicio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link mr-3 ml-3" href="/novedades">Novedades</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link mr-3 ml-3" href="/ofertas">Ofertas</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link mr-3 ml-3" href="/estiloMusical">Estilo Musical</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link mr-3 ml-3" href="/artistas">Artistas</a>
          </li>
        </ul>

        <form class="form-inline my-2 my-lg-0" action="{{ route('search') }}" method="GET">
          <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar" name="query">
          <!--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>-->
          <button class="btn" style="background-color: transparent; padding: 0;" type="submit">
            <img src="/img/lupa.png" alt="Buscar" width="40" height="40">
          </button>
        </form>


      </div>
    </div>
    <div class="col-3 d-flex justify-content-end">
      <a class="btn" style="background-color: transparent;" href="{{ route('shoppingcarts_index'); }}">
        <img class="mr-2" src="/img/ViniloWeb_Shopping_Cart_Icon_2.png" width="30" height="30">
      </a>
      <a class="btn" style="background-color: transparent;" href="{{ route('wishlist_index') }}">
        <img class="ml-2 mr-2" src="/img/ViniloWeb_Heart_Icon_2.png" width="30" height="30">
      </a>
      @guest
      <button class="btn" data-bs-toggle="modal" data-bs-target="#loginModal" style="background-color: transparent;">
        <img class="ml-2 mr-2" src="/img/ViniloWeb_User_Icon_2.png" width="30" height="30">
      </button>
      @else
      <div class="dropdown user-dropdown">
        <a class="btn btn-secondary dropdown-toggle" style="background-color: transparent;" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="ml-2 mr-2" src="/img/ViniloWeb_User_Icon_2.png" width="30" height="30">
        </a>
        <div class="dropdown-menu " aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="{{ route('profile',  ['id' => auth()->user()->id]) }}">Mi Perfil</a>
          <a class="dropdown-item" href="{{ route('users_order', ['id' => auth()->user()->id]) }}">Mis Compras</a>
          @can('admin')
          <a class="dropdown-item" href="{{ route('admin_index') }}">Administración</a>
          @endcan
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </div>
      @endguest
    </div>
  </nav>
</head>

<body>
  <div class="content">
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="loginModalLabel">Iniciar sesión</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('login') }}" method="POST">
              @csrf
              <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="mb-3">
                <div class="col-md-6">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                      {{ __('Recuerdame') }}
                    </label>
                  </div>
                </div>
                <div class="col-md-3">
                  <a class="btn btn-link" href="{{ route('register') }}">
                    {{ __('¿Aún no estás registrado?') }}
                  </a>
                </div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('¿Ha olvidado su contraseña?') }}
                </a>
                @endif
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    @yield('content')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

<footer>
  <hr>
  <div class="row justify-content-center">
    <span style="font-weight: bold; ">¿Necesitas ayuda?</span>
    <span style="font-weight: bold; margin-left: 50px;">Información corporativa</span>
  </div>
  <div class="row pt-2 justify-content-center">
    <a class="nav-link mr-3" href="/contactanos">
      <button class="btn" style="background-color: #393d42; margin-right: 30px;">
        <span class="text-white" style="font-weight: bold;">Contactanos</span>
      </button>
    </a>
    <a class="btn btn-link" style="font-weight: bold; margin-left: 20px;" href="/sobre-nosotros">Sobre nosotros</a>

  </div>
  <div class="row pt-2 justify-content-center">
    <button class="btn" style="background-color: transparent;">
      <a href="https://www.instagram.com/vinyl_oasis/"><img class="ml-1 mr-1" src="/img/instagram-icone-gris.png" width="30" height="30"></a>
    </button>
    <button class="btn" style="background-color: transparent;">
      <a href="https://www.facebook.com/profile.php?id=100093071348796"><img class="ml-1 mr-1" src="/img/facebook-icon.png" width="30" height="30"></a>
    </button>
    <button class="btn" style="background-color: transparent;">
      <a href="https://www.youtube.com/channel/UCEQNyAyVg7TPnEXtcwlk7Fw"><img class="ml-1 mr-1" src="/img/youtube-logo-icone-grise.png" width="30" height="30"></a>
    </button>
    <button class="btn" style="background-color: transparent;">
      <a href="https://twitter.com/web_VinylOasis"><img class="ml-1 mr-1" src="/img/icone-twitter-ronde-grise.png" width="30" height="30"></a>
    </button>
  </div>
</footer>


</html>