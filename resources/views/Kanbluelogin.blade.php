<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estiloslogin.css') }}">
</head>

<body class="d-flex flex-column align-items-center justify-content-center vh-100 bg-white">

    <div class="logo-login">
        <img src="{{ asset('images/color_mid.png') }}" alt="Logo" class="img-fluid">
    </div>

    <div class="card shadow p-4" style="width: 350px; border-radius: 1rem; background-color: rgba(255, 255, 255, 0.9);">
        <form>
            <div class="form-floating mb-3">
                <input type="email" class="form-control rounded-pill border border-primary" id="email" placeholder="Correo electrónico">
                <label for="email">Correo electrónico</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control rounded-pill border border-primary" id="password" placeholder="Contraseña">
                <label for="password">Contraseña</label>
            </div>

            <button type="submit" class="btn btn-primary w-100 rounded-pill mt-3">Login</button>
        </form>

        <p class="text-center mt-3 mb-0">¿Sin cuenta? <a href="Registro">Regístrate</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
