<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil de Usuario</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/EditarPerfil.css') }}">
</head>
<body>
    
  <div class="container-box">
    <div class="card-custom mt-3">
      <h5 class="mb-3">INFORMACIÓN DEL PERFIL</h5>
      <button class="btn-logout float-end mb-3">CERRAR SESIÓN</button>

      <form>
        <div class="mb-3">
          <label>Email</label>
          <input type="email" class="form-control" placeholder="Ingresa tu email">
        </div>
        <div class="mb-3">
          <label>Username</label>
          <input type="text" class="form-control" placeholder="Nombre de usuario">
        </div>
        <div class="mb-3">
          <label>Contraseña</label>
          <input type="password" class="form-control" placeholder="Nueva contraseña">
        </div>
        <div class="mb-3">
          <label>Confirmar contraseña</label>
          <input type="password" class="form-control" placeholder="Repite la contraseña">
        </div>
        <button type="submit" class="btn-guardar">Guardar cambios</button>
      </form>
    </div>
  </div>


</body>
</html>
