@extends('templates.base')

@section('title', 'Proyectos')

@section('navbar')

    <div class="d-flex align-items-center ms-auto">
        <span class="text-white small me-3" style="font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 20px">
            {{ $usuario->username }}</span>
        <a href="{{ route('usuaris.edit', $usuario->id_usuario) }}" class="iconoUsuario">
            <img src="{{ asset('images/usuario.png') }}" alt="Icono Usuario" width="50" height="50">
        </a>
    </div>

@endsection

@section('content')

    <div class="d-flex align-items-center justify-content-between p-3 headerProyectos">
        <h3 class="introText"><img src="{{ asset('images/cortana.png') }}" alt="Volver" width="40" height="40"> Bienvenido
            {{ $usuario->username }}, estos son sus proyectos actuales.</h3>
        <a href="{{ route('projects.crearProyecto', ['usuario' => $usuario->id_usuario]) }}"
            class="btnstylenewproject btnOg">
            NUEVO PROYECTO
        </a>
    </div>
    <div class="borderContainer">
        <div class="container text-center">
            @if ($projects->isEmpty())
                <p>No hay proyectos disponibles.</p>
            @else
                @foreach ($projects->chunk(3) as $projectChunk)
                    <div class="row justify-content-md-center mb-4">
                        @forelse ($projectChunk as $project)
                        @if ($project->activo == 1)
                            <div class="col-md-auto cardUltima">
                                <div class="col-md-auto cardSegunda">
                                    <div class="col-md-auto align-items-center projectCard">
                                        <div class="headerCard">
                                            <h3 class="projectTitle">{{ $project->nom }}</h3>
                                            <a class="ms-4" href="{{ route('projects.edit', $project->id_proyecto) }}">
                                                <img src="{{ asset('images/botonEditar.png') }}" alt="Editar"
                                                    class="imgEditar">
                                            </a>
                                        </div>
                                        <hr class="hrCard">
                                        <h5 class="projectDesc">{{ $project->descripcion ?? 'Sin descripción' }}</h5>
                                        <div class="footerCard w-100">
                                            <a href="{{ route('projects.show', $project->id_proyecto) }}"
                                                class="btnstylenewproject btnOg">
                                                <strong>ABRIR PROYECTO</strong>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif    
                        @empty
                        @endforelse
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
