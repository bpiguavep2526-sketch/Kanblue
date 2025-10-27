@extends('templates.base')

@section('navbar')
  <div class="d-flex align-items-center ms-auto">
    <span class="text-white small me-3" style="font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 20px">AJUSTES DE USUARIO</span>
    <div class="vr text-white me-3" style="height: 50px;"></div>
    <a href="" class="icon-container" >    
      <img src="images/salvar.png" alt="Volver" width="30" height="30">
      <img src="images/cerrar-sesion.png" alt="Volver" width="30" height="30">
      
    </a>
  </div>
@endsection
@section('content')
<main class="main-editarperfil">
  <div class="container-box">
        <div class="container-layer">
         <div class="card-custom">
          <div class="perfil-header d-flex align-items-center justify-content-between mb-4">
            <h5 class="perfil-title m-0 flex-fill text-center">INFORMACIÓN DEL PERFIL</h5>
              <button class="btn-logout mybutton">
                <img src="{{ asset('images/cambiar.png') }}" alt="Cerrar sesión" style="width:25px; height:25px; margin-right:12px;">
                CERRAR SESIÓN</button>
          </div>
        
           <form class="form-card">
  <!-- Correo electrónico -->
  <div class="mb-5 row align-items-center">
    <label class="col-md-3 col-form-label d-flex align-items-center">
      <img src="{{ asset('images/correo.png') }}" alt="icono correo" class="me-2" style="width:33px; height:33px;">
      Correo electrónico
    </label>
    <div class="col-md-9">
      <input type="email" class="form-control uniform-input" >
    </div>
  </div>
  <!-- Usuario -->
  <div class="mb-5 row align-items-center">
    <label for="inputUsuario" class="col-md-3 col-form-label">
       <img src="{{ asset('images/avatar.png') }}" alt="icono correo" class="me-2" style="width:33px; height:33px;">
      Usuario</label>
    <div class="col-md-9">
      <input type="text" class="form-control uniform-input" id="inputUsuario">
    </div>
  </div>
  <!-- Contraseña -->
  <div class="mb-5 row align-items-center">
    <label for="inputPassword" class="col-md-3 col-form-label">
      <img src="{{ asset('images/bloquear.png') }}" alt="icono correo" class="me-2" style="width:33px; height:33px;">
      Contraseña</label>
    <div class="col-md-9">
      <input type="password" class="form-control uniform-input" id="inputPassword" >
    </div>
  </div>
  <!-- Confirmar contraseña -->
  <div class="mb-5 row align-items-center">
    <label for="inputConfirmPassword" class="col-md-3 col-form-label">
      <img src="{{ asset('images/aprobar.png') }}" alt="icono correo" class="me-2" style="width:33px; height:33px;">
      Confirmar contraseña</label>
    <div class="col-md-9">
      <input type="password" class="form-control uniform-input" id="inputConfirmPassword">
    </div>
  </div>
</form> 
      </div>
    </div>
  </div>
</main>
@endsection
