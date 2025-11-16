<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="images/nav_icon.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Document')</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/tasks.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/editarTareas.css') }}">
    <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
    <link rel="stylesheet" href="{{ asset('css/editar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/indexProyecto.css') }}">
    </script>
</head>

<body class="generic_background">
<nav class="navbar" style="background-color: #79AAB7;" data-bs-theme="dark" >
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="#"  style="font-family: 'Poppins', sans-serif; font-weight: 600;">
      <img src="{{ asset('images/nav_icon.png') }}" alt="Kanblue Logo" width="55" height="50" class="d-inline-block align-text-center">
      <span class="ms-2">KanBlue</span>
    </a>
    @yield('navbar')
  </div>
</nav>
<div>
    @yield('content')
</div>
</body>

</html>