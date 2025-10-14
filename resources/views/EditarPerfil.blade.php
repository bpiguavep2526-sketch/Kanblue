<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Perfil de Usuario - KanBlue</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
</head>
<body>

  <div class="container-box">
        <div class="container-layer">
         <div class="card-custom">
          <div class="perfil-header d-flex align-items-center justify-content-between mb-4">
            <h5 class="perfil-title m-0 flex-fill text-center">INFORMACIÓN DEL PERFIL</h5>
              <button class="btn-logout flex-fill ms-3">CERRAR SESIÓN</button>
          </div>

              <div class="mb-3 row">
  <label for="exampleFormControlInput1" class="col-sm-2 col-form-label">Correo electrónico</label>
  <div class="col-sm-10">
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
</div>

<div class="mb-3 row">
  <label for="inputPassword" class="col-sm-2 col-form-label">Contraseña</label>
  <div class="col-sm-10">
    <input type="password" class="form-control" id="inputPassword">
  </div>
</div>

        
      </div>
    </div>
  </div>


</body>
</html>
