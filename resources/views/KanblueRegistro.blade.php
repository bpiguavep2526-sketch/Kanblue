<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilosregistro.css') }}">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-white">

<div class="d-flex align-items-center">
    <div class="me-4 logo-registro text-center">
        <img src="{{ asset('images/color_mid.png') }}" alt="Logo" class="img-fluid" style="width: 600px;">
    </div>

    <div class="card shadow p-4" style="width: 600px; border-radius: 1rem; background-color: rgba(255, 255, 255, 0.8);">
        <form>
            <h2 class="text-center mb-4">Registro de Cuenta</h2>

            <div class="row mb-3 align-items-center">
                <label for="Email" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control rounded-pill border border-primary" id="Email">
                </div>
            </div>

            <div class="row mb-3 align-items-center">
                <label for="Username" class="col-sm-4 col-form-label">Username</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control rounded-pill border border-primary" id="Username">
                </div>
            </div>

            <div class="row mb-3 align-items-center">
                <label for="password" class="col-sm-4 col-form-label">Contraseña</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control rounded-pill border border-primary" id="password">
                </div>
            </div>

            <div class="row mb-3 align-items-center">
                <label for="password-confirm" class="col-sm-4 col-form-label">Confirmar contraseña</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control rounded-pill border border-primary" id="password-confirm">
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 rounded-pill mt-3">Registrar</button>
        </form>

        <p class="text-center mt-3 mb-0">¿Ya tienes cuenta? <a href="Login">Inicia sesión</a></p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
