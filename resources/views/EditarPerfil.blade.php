@extends('templates.base')

@section('navbar')
    <div class="d-flex align-items-center ms-auto navbarLeft">
        <span class="text-white small me-3"
            style="font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 20px">AJUSTES DE USUARIO</span>
        <div class="vr text-white me-3" style="height: 50px;"></div>

        <button type="button" class="btn btn-light btnstyle borderizq"><img src="{{ asset('images/salvar.png') }}"
                alt="Volver" width="30" height="30" onclick="document.getElementById('formUser').submit();"></button>
        <a href="{{ route('projects.index') }}">
            <button type="button" class="btn btn-light btnstyle borderdrch"><img src="{{ asset('images/salida.png') }}"
                    alt="Volver" width="30" height="30"></button>
        </a>
        </a>
    @endsection
    @section('content')
        <main class="main-editarperfil">
            <div class="container-box">
                <div class="container-layer">
                    <div class="card-custom">
                        <div class="perfil-header d-flex align-items-center justify-content-between">
                            <h5 class="perfil-title m-0 flex-fill text-center">INFORMACIÓN DEL PERFIL</h5>

                            <form action="{{ route('logout') }}" method="POST" style="display:inline">
                                @csrf
                                <button type="submit" class="btn-logout mybutton">
                                    <img src="{{ asset('images/cambiar.png') }}" alt="Cerrar sesión"
                                        style="width:25px; height:25px; margin-right:12px;">
                                    CERRAR SESIÓN
                                </button>
                            </form>
                        </div>
                        <form class="form-card" id="formUser" action="{{ route('usuaris.update', $user->id_usuario) }}"
                            method="POST">
                            @method('PUT')
                            @csrf
                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <!-- Correo electrónico -->
                            <div class="mb-5 row align-items-center">
                                <label class="col-md-3 col-form-label d-flex align-items-center">
                                    <img src="{{ asset('images/correo.png') }}" alt="icono correo" class="me-2"
                                        style="width:33px; height:33px;">
                                    Correo electrónico
                                </label>
                                <div class="col-md-9">
                                    <input type="email" name="email" class="form-control uniform-input"
                                        value='{{ $user->email }}'>
                                </div>
                            </div>
                            <!-- Usuario -->
                            <div class="mb-5 row align-items-center">
                                <label for="inputUsuario" class="col-md-3 col-form-label">
                                    <img src="{{ asset('images/avatar.png') }}" alt="icono correo" class="me-2"
                                        style="width:33px; height:33px;">
                                    Usuario</label>
                                <div class="col-md-9">
                                    <input type="text" name="username" class="form-control uniform-input"
                                        id="inputUsuario" value='{{ $user->username }}'>
                                </div>
                            </div>
                            <!-- Contraseña -->
                            <div class="mb-5 row align-items-center">
                                <label for="inputPassword" class="col-md-3 col-form-label">
                                    <img src="{{ asset('images/bloquear.png') }}" alt="icono correo" class="me-2"
                                        style="width:33px; height:33px;">
                                    Contraseña</label>
                                <div class="col-md-9">
                                    <input type="password" name="password" class="form-control uniform-input"
                                        id="inputPassword">
                                </div>
                            </div>
                            <!-- Confirmar contraseña -->
                            <div class="mb-5 row align-items-center">
                                <label for="inputConfirmPassword" class="col-md-3 col-form-label">
                                    <img src="{{ asset('images/aprobar.png') }}" alt="icono correo" class="me-2"
                                        style="width:33px; height:33px;">
                                    Confirmar contraseña</label>
                                <div class="col-md-9">
                                    <input type="password" name="passwordconfirm" class="form-control uniform-input"
                                        id="inputConfirmPassword">
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </main>
    @endsection
