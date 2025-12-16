    @extends('templates.base')

    @section('title', 'Kanblue | Estadísticas y gráficos sobre el proyecto')

    @section('navbar')
        <div class="d-flex align-items-center ms-auto">
            <span class="text-white small me-3"
                style="font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 20px">ESTADÍSTICAS</span>
            <div class="vr text-white me-3" style="height: 50px;"></div>
            <a href="{{ route('projects.index') }}">
                <img src="{{ asset('images/return.png') }}" alt="Volver" width="30" height="30">
            </a>
        </div>
    @endsection

    @section('content')
        <div class="d-flex align-items-center justify-content-center p-5 chartContainer">
            <div class="d-flex flex-column border rounded-3 p-4 align-items-center"
                style="background-color: rgba(243, 243, 243, 0.749)">
                <h3 class="chartTitle">GRAFICOS DE TAREAS</h3>
                <canvas id="taskChart"></canvas>
            </div>
            <div class="d-flex flex-column border rounded-3 p-4 align-items-center ms-5 userChartContainer"
                style="background-color: rgba(243, 243, 243, 0.749)">
                <h3 class="chartTitle">TAREAS POR PERSONA</h3>
                <div class="d-flex justify-content-center mb-3">
                    <select id="selectUser" class="userSelector">
                        @foreach ($userList as $usuari)
                            <option value="{{ $usuari->id_usuario }}">{{ $usuari->username }}</option>
                        @endforeach
                    </select>
                    <button id="userChart" class="btn btn-primary ms-2">VER</button>
                </div>
                <p class="align-items-center justify-content-center">Selecciona un usuario para ver sus datos.</p>
                <canvas id="userChartStats"></canvas>
            </div>
        </div>
        <script>
            const tasks = @json($taskList);
            const users = @json($userList);
        </script>
        <script src="{{ asset('js/tasks/chart.js') }}"></script>
    @endsection
