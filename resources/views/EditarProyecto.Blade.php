<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Proyecto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/editar.css') }}">

</head>
<body> 
  <div class="container-box">
  <div class="container-layer">
    <div class="card-custom">
      <form>
        <div class="mb-9">
          <label class="form-label">Escribe el nombre del proyecto...</label>
          <input type="text" class="form-control" placeholder="Nombre del proyecto">
        </div>

        <div class="mb-3">
          <label class="form-label">Añade descripción</label>
          <textarea class="form-control" rows="3" placeholder="Describe el proyecto..."></textarea>
        </div>

        <div class="form-check mb-3">
          <input class="form-check-input" type="checkbox" id="checkEmpresa">
          <label class="form-check-label" for="checkEmpresa">Guardar</label>
        </div>

        <div class="d-flex justify-content-between">
          <button type="submit" class="btn-guardar">GUARDAR</button>
          <button type="button" class="btn-eliminar">ELIMINAR</button>
        </div>
      </form>
    </div>
  </div>
  </div>

</body>
</html>
