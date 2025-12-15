@extends('templates.base')

@section('title', 'Kanblue | Editar Tarea')

@section('navbar')
    <div class="d-flex align-items-center ms-auto">
        <span class="text-white small me-3" style="font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 20px">
            @if ($tarea == null)
                NUEVA TAREA
            @else
                {{ $tarea->titulo }}
            @endif
        </span>
        <div class="vr text-white me-3" style="height: 50px;"></div>

        <button type="button" class="btn btn-light btnstyle borderizq"><img src="{{ asset('images/salvar.png') }}"
                alt="Volver" width="30" height="30" onclick="document.getElementById('taskForm').submit();"></button>

        <a href="{{ route('projects.show', $project->id_proyecto) }}">
            <button type="button" class="btn btn-light btnstyle borderdrch">
                <img src="{{ asset('images/salida.png') }}" alt="Volver" width="30" height="30">
            </button>
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
                            @if ($tarea == null)
                                <form id="taskForm"
                                    action="{{ route('tasks.store', ['project' => $project->id_proyecto]) }}"
                                    method="POST">
                                @else
                                    <form id="taskForm" action="{{ route('tasks.update', ['task' => $tarea->id_tarea]) }}"
                                        method="POST">
                                        @method('PUT')
                            @endif
                            @csrf
                            <fieldset>
                                @if (session('error'))
                                    <div class="alert alert-danger mt-2">{{ session('error') }}</div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success mt-2" style="max-width: 85%">{{ session('success') }}</div>
                                @endif
                                @if ($tarea != null)
                                    <input type="text" name="titulo" class="titleinput"
                                        placeholder="Escribe el título..." value="{{ $tarea->titulo }}">
                                @else
                                    <input type="text" name="titulo" class="titleinput"
                                        placeholder="Escribe el título...">
                                @endif
                                </input>
                                <div class="mb-3 my-custom-style">
                                    <img class="imgTareas" src="{{ asset('images/usuario2.png') }}" alt="Volver"
                                        width="30" height="30">
                                    <label for="disabledSelect" class="form-label">Asignado a: </label>
                                    <select id="disabledSelect" name="usuario" class="form-select center-form"
                                        placeholder='usuario'>
                                        @foreach ($usuarios as $usuari)
                                            @if ($tarea != null)
                                                @if ($usuari->id_usuario == $tarea->id_usuario)
                                                    <option selected>{{ $usuari->username }}</option>
                                                @else
                                                    <option>{{ $usuari->username }}</option>
                                                @endif
                                            @else
                                                <option>{{ $usuari->username }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 my-custom-style">
                                    <img class="imgTareas" src="{{ asset('images/etiqueta2.png') }}" alt="Volver"
                                        width="30" height="30">
                                    <label for="disabledSelect" class="form-label">Tipo de tarea: </label>
                                    <select id="disabledSelect" name="tipo" class="form-select center-form-one"
                                        holder="Usuario #32">
                                        @foreach ($tipostarea as $tipo)
                                            <option>{{ $tipo->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 my-custom-style">
                                    <img class="imgTareas" src="{{ asset('images/fuente.png') }}" alt="Volver"
                                        width="30" height="30">
                                    <label for="exampleFormControlTextarea1"
                                        class="form-label center-form-label">Descripcion</label>
                                    @if ($tarea != null)
                                        <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1" rows="7"
                                            placeholder="Escribe aquí....">{{ $tarea->descripcion }}</textarea>
                                    @else
                                        <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1" rows="7"
                                            placeholder="Escribe aquí...."></textarea>
                                    @endif
                                </div>
                                <div class="mb-3 my-custom-style">
                                    <img class="imgTareas" src="{{ asset('images/lista2.png') }}" alt="Volver"
                                        width="30" height="30">
                                    <label for="disabledSelect" class="form-label">Estado</label>
                                    <select id="disabledSelect"name="estado" class="form-select center-form-two"
                                        holder="TODO">
                                        @foreach ($estados as $status)
                                            @if ($tarea != null)
                                                @if ($tarea->id_estado == $status->id_estado)
                                                    <option selected>{{ $status->nom }}</option>
                                                @else
                                                    <option>{{ $status->nom }}</option>
                                                @endif
                                            @else
                                                <option>{{ $status->nom }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </fieldset>
                            </form>
                            <div class="mb-3 my-custom-style">
                                @if ($tarea != null)
                                <img class="imgTareas" src="{{ asset('images/borrar2.png') }}" alt="">
                                <label for="disabledSelect" class="form-label">Borrar Tarea</label>
                                <label for="disabledSelect" class="form-label"></label>
                                    <form action="{{ route('tasks.delete', $tarea->id_tarea) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn-eliminar">ELIMINAR</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
