@extends('templates.base')

@section('title', 'Kanblue | Proyectos')

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
        @if ($projects->isEmpty())
            <h3 class="introText"><img src="{{ asset('images/cortana.gif') }}" alt="Volver" width="50"
                    height="50">¡Bienvenido a Kanblue! Cree un proyecto para empezar.</h3>
            <a href="{{ route('projects.crearProyecto', ['usuario' => $usuario->id_usuario]) }}"
                class="btnstylenewproject btnOg">
                NUEVO PROYECTO
            </a>
        @else
            <h3 class="introText"><img class="me-2" src="{{ asset('images/cortana.gif') }}" alt="Volver" width="70"
                    height="70">Bienvenido, estos són sus proyectos actuales.</h3>
            <a href="{{ route('projects.crearProyecto', ['usuario' => $usuario->id_usuario]) }}"
                class="btnstylenewproject btnOg">
                NUEVO PROYECTO
            </a>
        @endif

    </div>
    <div class="borderContainer">
        <div class="container text-center">
            @if ($projects->isEmpty())
                <p class="noprojectfound">No hay proyectos disponibles.</p>
            @else
                @foreach ($projects->chunk(2) as $projectPair)
                    <div class="row justify-content-md-center mb-4">
                        @forelse ($projectPair as $project)
                            <div class="col-md-auto cardUltima">
                                <div class="col-md-auto cardSegunda">
                                    <div class="col-md-auto align-items-center projectCard">
                                        <div class="headerCard">
                                            <h3 class="projectTitle">{{ $project->nom }}</h3>
                                            @foreach ($ids_myProjects as $id_myProject)
                                                @if ($id_myProject == $project->id_proyecto)
                                                    <a class="ms-4"
                                                        href="{{ route('projects.edit', $project->id_proyecto) }}">
                                                        <img src="{{ asset('images/botonEditar.png') }}" alt="Editar"
                                                            class="imgEditar">
                                                    </a>
                                                @endif
                                            @endforeach
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
                        @empty
                        @endforelse
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
