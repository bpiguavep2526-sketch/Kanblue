@extends('templates.base')

@section('navbar')
  <div class="d-flex align-items-center ms-auto">
    <span class="text-white small me-3" style="font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 20px">PROYECTO #45</span>
    <div class="vr text-white me-3" style="height: 50px;"></div>
    <a href="" >    
      <img src="images/return.png.png" alt="Volver" width="30" height="30">
    </a>
  </div>
@endsection

@section('content')
<main class="main-editarperfil">
  <div class="container-box">
  <div class="container-layer">
    <div class="card-custom">
      <form>
        <div class="mb-9">
          <input type="text" class="form-control" placeholder=" Escribe el nombre del proyecto">
        </div>

        <div class="mb-5 row align-items-center">
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
</main>
@endsection


