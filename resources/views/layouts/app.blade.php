<!doctype html>
<html lang="en">
<head> <!-- lugar para importar cosas y hacer configuraciones -->
  <meta charset="utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- SE IMPORTA LA LIBRERIA DE BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
  <!-- mi propio archivo de estilos -->
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
  <!-- IMPORTANT CONCEPTO, ESTO ES CONETENIDO DINAMICO
   SE PUEDE CAMBIAR POR EL ARCHIVO HIJO, SINO SE PONE EL VALOR DEFAULT! -->
  <title>@yield('title', 'Online Store')</title>
</head>
<body> <!-- AQUI LO QUE SALE EN PANTALLA
   añadimos las rutas para que el usuario interactue con los botones
   y le lleven a la pagina --> 
  <!-- header --> 
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
    <div class="container">
      <!-- en el logo para ir a home --> 
      <a class="navbar-brand" href="{{ route('home.index') }}">Online Store</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <!-- para estos botones los llevan a index y about --> 
          <a class="nav-link active" href="{{ route('home.index') }}">Home</a>
          <a class="nav-link active" href="{{ route('home.about') }}">About</a>
          <a class="nav-link active" href="{{ route('home.contact') }}">Contact</a>
          <a class="nav-link active" href="{{ route('product.index') }}">Products</a>
          <a class="nav-link active" href="{{ route('product.create') }}">Create Product</a
        </div>
      </div>
    </div>
  </nav>

  <header class="masthead bg-primary text-white text-center py-4">
    <div class="container d-flex align-items-center flex-column">
      <h2>@yield('subtitle', 'A Laravel EAFIT App')</h2>
    </div>
  </header>
  <!-- header -->

  <div class="container my-4">
    @yield('content')
  </div>

  <!-- footer -->
  <div class="copyright py-4 text-center text-white">
    <div class="container">
      <small>
        Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank"
          href="https://twitter.com/danielgarax">
          Daniel Correa
        </a>
      </small>
    </div>
  </div>
  <!-- footer -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
</body>
</html>
