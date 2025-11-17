@extends('templates.base')

@section('navbar')
    <div class="d-flex align-items-center ms-auto">
        @if ($project == null)
            <span class="text-white small me-3"
                style="font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 20px">PROYECTO NUEVO</span>
        @else
            <span class="text-white small me-3"
                style="font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 20px">{{ $project->nom }}</span>
        @endif
        <div class="vr text-white me-3" style="height: 50px;"></div>
        <a href="{{ route('projects.index') }}">
            <img src="{{ asset('images/cerrar-sesion.png') }}" alt="Volver" width="30" height="30">
        </a>
    </div>
@endsection

@section('content')
    <main class="main-editarperfil">
        <div class="container-box">
            <div class="container-layer">
                <div class="card-custom">
                    <div class="perfil-header d-flex align-items-center justify-content-between mb-4">
                        <h5 class="perfil-title m-0 flex-fill text-center">EDITAR PROYECTO</h5>
                    </div>
                    @if ($project == null)
                        <form class="form-card" style="height: fit-content;" action="{{ route('projects.store', ['usuario' => $usuario->id_usuario]) }}"
                            method="POST">
                        @else
                            <form class="form-card"   style="height: fit-content;"
                                action="{{ route('projects.update', ['project' => $project->id_proyecto]) }}"
                                method="POST">
                                @method('PUT')
                    @endif

                    @csrf
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="mb-5 row align-items-center">
                        <label class="col-md-3 col-form-label d-flex align-items-center">
                            <img src="{{ asset('images/gestion-de-proyectos.png') }}" alt="icono proyecto" class="me-2"
                                style="width:33px; height:33px;">
                            Nombre del proyecto
                        </label>
                        <div class="col-md-9">
                            <input type="text" name="nom" class="form-control uniform-input"
                                placeholder="Escribe el nombre del proyecto" value="{{ $project ? $project->nom : '' }}"
                                required>
                        </div>
                    </div>

                    <!-- Descripción del proyecto -->
                    <div class="mb-5 row align-items-start">
                        <label class="col-md-3 col-form-label d-flex align-items-center ">
                            <img src="{{ asset('images/fuente.png') }}" alt="icono descripción" class="me-2"
                                style="width:33px; height:33px;">
                            Descripción 
                        </label>
                        <div class="col-md-9">
                            <textarea name="descripcion" class="form-control" rows="3" placeholder="Describe el proyecto..." required>{{ $project ? $project->descripcion : '' }}</textarea>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn-guardar">GUARDAR</button>
                    </div>
                    </form>
                    <div>
                        @if ($project)
                            <form action="{{ route('projects.delete', $project->id_proyecto) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit"  class="btn-eliminar ms-4">ELIMINAR</button>
                            </form>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
