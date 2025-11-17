@extends('templates.base')

@section('navbar')
  <div class="d-flex align-items-center ms-auto">
    <span class="text-white small me-3" style="font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 20px">PROYECTO NUEVO</span>
    <div class="vr text-white me-3" style="height: 50px;"></div>
    <a href="" >    
      <img src="images/cerrar-sesion.png" alt="Volver" width="30" height="30">
    </a>
  </div>
@endsection0

@section('content')
<main class="main-editarperfil">
  <div class="container-box">
    <div class="container-layer">
      <div class="card-custom">
        <div class="perfil-header d-flex align-items-center justify-content-between mb-4">
          <h5 class="perfil-title m-0 flex-fill text-center">EDITAR PROYECTO</h5>
          
        </div>

        <form class="form-card">
          <!-- Nombre del proyecto -->
          <div class="mb-5 row align-items-center">
            <label class="col-md-3 col-form-label d-flex align-items-center">
              <img src="{{ asset('images/gestion-de-proyectos.png') }}" alt="icono proyecto" class="me-2" style="width:33px; height:33px;">
              Nombre del proyecto
            </label>
            <div class="col-md-9">
              <input type="text" class="form-control uniform-input" placeholder="Escribe el nombre del proyecto">
            </div>
          </div>

          <!-- Descripción del proyecto -->
          <div class="mb-5 row align-items-start">
            <label class="col-md-3 col-form-label d-flex align-items-center ">
              <img src="{{ asset('images/fuente.png') }}" alt="icono descripción" class="me-2" style="width:33px; height:33px;">
              Descripción
            </label>
            <div class="col-md-9">
              <textarea class="form-control " rows="3" placeholder="Describe el proyecto..."></textarea>
            </div>
          </div>

          <!-- Guardar proyecto -->
          <div class="mb-5 row align-items-center">
            <div class="col-md-3"></div>
            <div class="col-md-9">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="checkGuardar">
                <label class="form-check-label" for="checkGuardar">Guardar automáticamente</label>
              </div>
            </div>
          </div>

          <!-- Botones -->
          <div class="d-flex justify-content-between">
            <button type="submit" class="btn-guardar">GUARDAR</button>
            <button type="button" class="btn-eliminar">ELIMINAR</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
@endsection


