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
  <div class="container-box">
        <div class="container-layer">
         <div class="card-custom">
          <div class="perfil-header d-flex align-items-center justify-content-between mb-4">
            <h5 class="perfil-title m-0 flex-fill text-center">INFORMACIÓN DEL PERFIL</h5>
              <button class="btn-logout">CERRAR SESIÓN</button>
          </div>
           <form>

         <div class="mb-3 row align-items-center">
    <label class="col-md-3 col-form-label d-flex align-items-center">
        <img src="{{ asset('assets/correo.png') }}" alt="icono correo" class="me-2" style="width:22px; height:22px;">
        Correo electrónico
    </label>
    <div class="col-md-9">
        <input type="email" class="form-control" style="font-size:1.2rem; padding:15px;">
    </div>
</div>
<div class="mb-3 row">
    <label for="inputUsuario" class="col-sm-2 col-form-label">Usuario</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputUsuario" >
    </div>
  </div>

<div class="mb-3 row">
  <label for="inputPassword" class="col-sm-2 col-form-label">Contraseña</label>
  <div class="col-sm-10">
    <input type="password" class="form-control" id="inputPassword">
  </div>
</div>
<div class="mb-3 row">
    <label for="inputConfirmPassword" class="col-sm-2 col-form-label">Confirmar contraseña</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputConfirmPassword">
    </div>
  </div>

</form>
        
      </div>
    </div>
  </div>
@endsection
