@extends('templates.base')

@section('title', 'Tareas')

@section('navbar')
    <div class="d-flex align-items-center ms-auto">
        <span class="text-white small me-3"
            style="font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 20px">PROYECTO #45</span>
        <div class="vr text-white me-3" style="height: 50px;"></div>
        <a href="">
            <img src="images/return.png.png" alt="Volver" width="30" height="30">
        </a>
    </div>
@endsection

@section('content')
    <div class="d-flex justify-content-end p-2">
        <a href="{{ route('editarTarea') }}" class="btnOg"
            style="margin-right: 20px; margin-top: 10px; display:inline-block; text-decoration:none; text-align:center;">
            NUEVA TAREA
        </a>
    </div>
    <div class="kanbanTable">
        <div class="column">
            <div class="d-flex align-items-center">
                <h2 class="columnTitle">BACKLOG</h2>
                <img src="images/showlist.png" class="showList" alt="Desplegar" width="30px" height="30px">
            </div>
            <div class="taskList" data-status="backlog">
                @foreach ($tareas as $tarea)
                @if ($tarea->id_estado == 1)
                    <div draggable="true" class="taskCard" data-status="backlog">
                        <div class="taskHeader">
                            <h4>{{ $tarea->titulo }}</h4>
                        </div>
                        <hr
                            style="width:100%;text-align:left;margin-left:0;border:none; height: 3px; background-color: black;">
                        <p class="descTask">{{ $tarea->descripcion }}</p>
                        <hr
                            style="width:100%;text-align:left;margin-left:0;border:none; height: 3px; background-color: black;">
                        <div class="taskDetails">
                            <div style="font-family: 'Poppins', sans-serif;">
                                <img src="images/available_task.png" alt="Disponible" width="20px" height="20px"
                                    class="d-inline-block align-text-center me-1">
                                @if ($tarea->id_tipus)
                                    @foreach ($usuarios as $user)
                                        @if ($user->id_usuario == $tarea->id_usuario)
                                            {{ $user->username }}
                                        @endif
                                    @endforeach
                                @else
                                    Disponible
                                @endif
                            </div>
                            @foreach ($tipostarea as $tasktype)
                            @if ($tasktype->id_tipus == $tarea->id_tipus)
                                <p class="tagRed">{{ $tasktype->nom }}</p>
                            @endif
                            @endforeach
                        </div>
                    </div>
                @endif
                @endforeach
            </div>
        </div>
        <div class="column">
            <div class="d-flex align-items-center">
                <h2 class="columnTitle">TODO</h2>
                <img src="images/showlist.png" class="showList" alt="Desplegar" width="30px" height="30px"
                    class="align-text-center ms-2">
            </div>
            <div class="taskList" data-status="todo">
                @foreach ($tareas as $tarea)
                @if ($tarea->id_estado == 2)
                    <div draggable="true" class="taskCard" data-status="todo">
                        <div class="taskHeader">
                            <h4>{{ $tarea->titulo }}</h4>
                        </div>
                        <hr
                            style="width:100%;text-align:left;margin-left:0;border:none; height: 3px; background-color: black;">
                        <p class="descTask">{{ $tarea->descripcion }}</p>
                        <hr
                            style="width:100%;text-align:left;margin-left:0;border:none; height: 3px; background-color: black;">
                        <div class="taskDetails">
                            <div style="font-family: 'Poppins', sans-serif;">
                                <img src="images/available_task.png" alt="Disponible" width="20px" height="20px"
                                    class="d-inline-block align-text-center me-1">
                                @if ($tarea->id_tipus)
                                    @foreach ($usuarios as $user)
                                        @if ($user->id_usuario == $tarea->id_usuario)
                                            {{ $user->username }}
                                        @endif
                                    @endforeach
                                @else
                                    Disponible
                                @endif
                            </div>
                            @foreach ($tipostarea as $tasktype)
                            @if ($tasktype->id_tipus == $tarea->id_tipus)
                                <p class="tagRed">{{ $tasktype->nom }}</p>
                            @endif
                            @endforeach
                        </div>
                    </div>
                @endif
                @endforeach
            </div>
        </div>
        <div class="column">
            <div class="d-flex align-items-center">
                <h2 class="columnTitle">IN PROGRESS</h2>
                <img src="images/showlist.png" class="showList" alt="Desplegar" width="30px" height="30px"
                    class="align-text-center ms-2">
            </div>
            <div class="taskList" data-status="in progress">
                @foreach ($tareas as $tarea)
                @if ($tarea->id_estado == 3)
                    <div draggable="true" class="taskCard" data-status="in progress">
                        <div class="taskHeader">
                            <h4>{{ $tarea->titulo }}</h4>
                        </div>
                        <hr
                            style="width:100%;text-align:left;margin-left:0;border:none; height: 3px; background-color: black;">
                        <p class="descTask">{{ $tarea->descripcion }}</p>
                        <hr
                            style="width:100%;text-align:left;margin-left:0;border:none; height: 3px; background-color: black;">
                        <div class="taskDetails">
                            <div style="font-family: 'Poppins', sans-serif;">
                                <img src="images/available_task.png" alt="Disponible" width="20px" height="20px"
                                    class="d-inline-block align-text-center me-1">
                                @if ($tarea->id_tipus)
                                    @foreach ($usuarios as $user)
                                        @if ($user->id_usuario == $tarea->id_usuario)
                                            {{ $user->username }}
                                        @endif
                                    @endforeach
                                @else
                                    Disponible
                                @endif
                            </div>
                            @foreach ($tipostarea as $tasktype)
                            @if ($tasktype->id_tipus == $tarea->id_tipus)
                                <p class="tagRed">{{ $tasktype->nom }}</p>
                            @endif
                            @endforeach
                        </div>
                    </div>
                @endif
                @endforeach
            </div>
        </div>
        <div class="column">
            <div class="d-flex align-items-center">
                <h2 class="columnTitle">DONE</h2>
                <img src="images/showlist.png" class="showList" alt="Desplegar" width="30px" height="30px"
                    class="align-text-center ms-2">
            </div>
            <div class="taskList" data-status="done">
                @foreach ($tareas as $tarea)
                @if ($tarea->id_estado == 4)
                    <div class="taskCard" data-status="done"> 
                        <div class="taskHeader">
                            <h4>{{ $tarea->titulo }}</h4>
                        </div>
                        <hr
                            style="width:100%;text-align:left;margin-left:0;border:none; height: 3px; background-color: black;">
                        <p class="descTask">{{ $tarea->descripcion }}</p>
                        <hr
                            style="width:100%;text-align:left;margin-left:0;border:none; height: 3px; background-color: black;">
                        <div class="taskDetails">
                            <div style="font-family: 'Poppins', sans-serif;">
                                <img src="images/available_task.png" alt="Disponible" width="20px" height="20px"
                                    class="d-inline-block align-text-center me-1">
                                @if ($tarea->id_tipus)
                                    @foreach ($usuarios as $user)
                                        @if ($user->id_usuario == $tarea->id_usuario)
                                            {{ $user->username }}
                                        @endif
                                    @endforeach
                                @else
                                    Disponible
                                @endif
                            </div>
                            @foreach ($tipostarea as $tasktype)
                            @if ($tasktype->id_tipus == $tarea->id_tipus)
                                <p class="tagRed">{{ $tasktype->nom }}</p>
                            @endif
                            @endforeach
                        </div>
                    </div>
                @endif
                @endforeach
            </div>
        </div>
        <script src="js/tasks/tasks.js"></script>

    </div>
@endsection
