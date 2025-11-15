@extends('templates.base')

@section('title', 'Proyectos')

@section('navbar')

    <div class="d-flex align-items-center ms-auto">
        <span class="text-white small me-3" style="font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 20px">
            {{ $usuario->username }}</span>
        <div class="iconoUsuario">
            <img src="{{ asset('images/usuario.png') }}" alt="Icono Usuario" width="50" height="50">
        </div>
    </div>

@endsection

@section('content')

    <div class="d-flex align-items-center justify-content-between p-3 headerProyectos">
        <h3 ><img src="{{ asset('images/cortana.png') }}" alt="Volver" width="40" height="40"> Bienvenido {{ $usuario->username }} , estos son sus proyectos actuales</h3>
        <a href="{{ route('tasks.edit') }}" class="btnstylenewproject btnOg"> NUEVO PROYECTO </a>
    </div>
    <div class="borderContainer">
        <div class="container text-center">
            @foreach ($projects->chunk(3) as $projectChunk)
                <div class="row flex-nowrap justify-content-md-center">
                    @forelse ($projectChunk as $project)
                        <div class="col-md-auto cardUltima">
                            <div class="col-md-auto cardSegunda">
                                <div class="col-md-auto projectCard">
                                    <div class="headerCard">
                                        <h3>{{ $project->nom }} #{{ $project->id_proyecto }}</h3>
                                        {{-- <a href="{{ route('projects.edit', $project->id) }}">
                                            <img src="{{ asset('images/botonEditar.png') }}" alt="Editar"
                                                class="imgEditar">
                                        </a> --}}
                                    </div>
                                    <hr class="hrCard">
                                    <ul> 
                                        <li>{{ $project->descripcion ?? 'Sin descripción' }}</li>
                                    </ul>
                                    <div class="footerCard">
                                        <a href="{{ route('projects.show', $project->id_proyecto) }}"
                                            class="btnstylenewproject btnOg">
                                            <strong>ABRIR PROYECTO</strong>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No hay proyectos disponibles.</p>    
                    @endforelse
                </div>
            @endforeach
        </div>
    </div>
@endsection
