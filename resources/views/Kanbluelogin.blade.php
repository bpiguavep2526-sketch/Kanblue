<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="icon" type="image/x-icon" href="images/nav_icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estiloslogin.css') }}">
</head>

<body class="d-flex flex-column align-items-center justify-content-center vh-100 background_login">
   <main>
     <div class="contenerdor_login">
    <div class="logo-login">
        <img src="{{ asset('images/color_mid.png') }}" alt="Logo" class="img-fluid">
    </div>
    <div class="card shadow p-4" style="width: 350px; border-radius: 1rem; background-color: rgba(255, 255, 255, 0.9);">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="/Kanblue/public/Login">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" name="username" class="form-control rounded-pill border border-primary" id="username" placeholder="Usuario" value="{{ old('username') }}">
                <label for="username">Usuario</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control rounded-pill border border-primary" id="password" placeholder="Contraseña">
                <label for="password">Contraseña</label>
            </div>

            <button type="submit" class="btn btn-primary w-100 rounded-pill mt-3">Login</button>
        </form>

        <p class="text-center mt-3 mb-0">¿Sin cuenta? <a href="Registro">Regístrate</a></p>
    </div>
     </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
