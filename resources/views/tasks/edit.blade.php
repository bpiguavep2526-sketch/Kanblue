@extends('templates.base')

@section('title', 'Editar/Crear Tarea')

@section('navbar')
    <div class="d-flex align-items-center ms-auto">
        {{-- Muestra el ID de la tarea si existe --}}
        @if($task!=NULL)
            <span class="text-white small me-3"
                style="font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 20px">PROYECTO #42378 | TAREA #{{ $task->id_tarea }}</span>
        @else
             <span class="text-white small me-3"
                style="font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 20px">NUEVA TAREA</span>
        @endif
        <div class="vr text-white me-3" style="height: 50px;"></div>
        {{-- Botón de Guardar (Submit del formulario) --}}
        <button type="submit" form="task-form" class="btn btn-light btnstyle borderizq me-3">
            <img src="{{ asset('images/salvar.png') }}" alt="Guardar" width="30" height="30">
        </button>
        {{-- Botón de Volver --}}
        <a href="{{ route('tasks.index') }}">
            <button type="button" class="btn btn-light btnstyle borderdrch"><img src="{{ asset('images/salida.png') }}"
                    alt="Volver" width="30" height="30"></button>
        </a>
    </div>
@endsection

@section('content')
    <div class="card ultimacarta">
        <div class="card-body ultimacardbody">
            <div class="card segundacarta">
                <div class="card-body ultimacardbody">
                    <div class="card primeracarta">
                        <div class="card-body ultimacardbody">
                            {{-- Formulario principal de Tarea --}}
                            <form id="task-form" 
                                @if(isset($task) && $task!=NULL)
                                    action="{{ route('tasks.update', $task) }}" method="POST"
                                @else 
                                    action="{{ route('tasks.store') }}" method="POST"
                                @endif
                            >
                                @csrf
                                @if($task!=NULL) 
                                    @method('PUT') 
                                @endif
                                <fieldset>
                                    {{-- Título --}}
                                    <textarea class="titleinput" id="titulo" name="titulo">
                                        @if ($task!=NULL)
                                            {{ trim($task->titulo) }}
                                        @else
                                            Escribe el nombre de la tarea...
                                        @endif
                                    </textarea>
                                    
                                    {{-- Asignado a (Usuario) --}}
                                    <div class="mb-3 my-custom-style">
                                        <img class="imgTareas" src="{{ asset('images/usuario2.png') }}" alt="Usuario" width="30" height="30">
                                        <label for="id_usuario" class="form-label">Asignado a: </label>
                                        {{-- El select SÓLO debe tener el ID como value --}}
                                        <select id="id_usuario" name="id_usuario" class="form-select center-form">
                                            @foreach ($usuarios as $usuari)
                                                <option value="{{ $usuari->id_usuario }}" 
                                                    @if ($task!=NULL && $usuari->id_usuario == $task->id_usuario) 
                                                        selected
                                                    @endif
                                                >
                                                    {{ $usuari->username }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    {{-- Tipo de tarea --}}
                                    <div class="mb-3 my-custom-style">
                                        <img class="imgTareas" src="{{ asset('images/etiqueta2.png') }}" alt="Etiqueta" width="30" height="30">
                                        <label for="id_tipus" class="form-label">Tipo de tarea: </label>
                                        <select id="id_tipus" name="id_tipus" class="form-select center-form-one">
                                            @foreach ($tipostarea as $tipo)
                                                <option value="{{ $tipo->id_tipus }}" 
                                                    @if ($task!=NULL && $tipo->id_tipus == $task->id_tipus) 
                                                        selected
                                                    @endif
                                                >
                                                    {{ $tipo->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    {{-- Descripción --}}
                                    <div class="mb-3 my-custom-style">
                                        <img class="imgTareas" src="{{ asset('images/fuente.png') }}" alt="Descripción" width="30" height="30">
                                        <label for="descripcion" class="form-label center-form-label">Descripción</label>
                                        <textarea class="form-control" id="descripcion" name="descripcion" rows="7" placeholder="Escribe aquí....">@if ($task!=NULL){{ $task->descripcion }}@endif</textarea>
                                    </div>
                                    
                                    {{-- Estado --}}
                                    <div class="mb-3 my-custom-style">
                                        <img class="imgTareas" src="{{ asset('images/lista2.png') }}" alt="Estado" width="30" height="30">
                                        <label for="id_estado" class="form-label">Estado</label>
                                        <select id="id_estado" name="id_estado" class="form-select center-form-two">
                                            @foreach ($estados as $status)
                                                <option value="{{ $status->id_estado }}" 
                                                    @if ($task!=NULL && $status->id_estado == $task->id_estado) 
                                                        selected
                                                    @endif
                                                >
                                                    {{ $status->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    {{-- Botón de Borrar (Solo visible en modo edición) --}}
                                    @if ($task!=NULL)
                                        <div class="mb-3 my-custom-style">
                                            <img class="imgTareas" src="{{ asset('images/borrar2.png') }}" alt="Borrar">
                                            <label class="form-label me-3">Borrar Tarea</label>
                                            <button type="button" class="btn btn-danger btntareas" data-bs-toggle="modal" data-bs-target="#deleteModal">ELIMINAR</button>
                                        </div>
                                    @endif

                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Modal de Confirmación de Eliminación (Solo en modo edición) --}}
    @if ($task!=NULL)
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Estás seguro de que quieres eliminar la tarea "{{ $task->titulo }}"?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar Tarea</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    <img class="editTaskBg" src="{{ asset('images/formasGeometricas.png') }}" alt="Formas geométricas" class="img-esquina"
        width="200" height="200">

@endsection