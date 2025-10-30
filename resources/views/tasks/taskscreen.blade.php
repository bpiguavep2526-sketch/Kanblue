@extends('templates.base')

@section('navbar')
  <div class="d-flex align-items-center ms-auto">
    <span class="text-white small me-3" style="font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 20px">PROYECTO #45</span>
    <div class="vr text-white me-3" style="height: 50px;"></div>
    <a href="" >    
      <img src="images/return.png.png" alt="Volver" width="30" height="30">
    </a>
  </div>
@endsection

@section('content') 
<div class="d-flex justify-content-end p-2">
  <a href="{{ route('editarTarea') }}" class="btnOg" style="margin-right: 20px; margin-top: 10px; display:inline-block; text-decoration:none; text-align:center;">
  NUEVA TAREA
</a>
</div>
<div class="kanbanTable">
  <div class="column">
    <div class="d-flex align-items-center"> 
      <h2 class="columnTitle">BACKLOG</h2>
      <img src="images/add_task.png" alt="Añadir tarea" width="30px" height="30px" class="d-inline-block align-text-center ms-2">
    </div>
    <div class="taskList">
      <div class="taskCard">
        <div class="taskHeader">
          <h4>TAREA #1</h4>
        </div>
        <hr style="width:100%;text-align:left;margin-left:0;border:none; height: 3px; background-color: black;">
        <p class="descTask">Descripción de tarea</p>
        <hr style="width:100%;text-align:left;margin-left:0;border:none; height: 3px; background-color: black;">
      <div class="taskDetails">
        <a>
          <img src="images/available_task.png" alt="Disponible" width="20px" height="20px" class="d-inline-block align-text-center me-1">
           Disponible
        </a>
        <p class="tagRed">DOCUMENTACION</p>
      </div>
      </div>
      <div class="taskCard">
        <div class="taskHeader">
          <h4>TAREA #1</h4>
        </div>
        <hr style="width:100%;text-align:left;margin-left:0;border:none; height: 3px; background-color: black;">
        <p class="descTask">Descripción de tarea</p>
        <hr style="width:100%;text-align:left;margin-left:0;border:none; height: 3px; background-color: black;">
      <div class="taskDetails">
        <a font-family: Poppins;>
          <img src="images/asigned_task.png" alt="Asignado a" width="20px" height="20px" class="d-inline-block align-text-center me-1">
           Usuario #45
        </a>
        <p class="tagRed">DOCUMENTACION</p>
      </div>
      </div>
      <div class="taskCard">
        <div class="taskHeader">
          <h4>TAREA #1</h4>
        </div>
        <hr style="width:100%;text-align:left;margin-left:0;border:none; height: 3px; background-color: black;">
        <p class="descTask">Descripción de tarea</p>
        <hr style="width:100%;text-align:left;margin-left:0;border:none; height: 3px; background-color: black;">
      <div class="taskDetails">
        <a>
           <img src="images/available_task.png" alt="Disponible" width="20px" height="20px" class="d-inline-block align-text-center me-1">
           Disponible
        </a>
        <p class="tagRed">DOCUMENTACION</p>
      </div>
      </div>
    </div>
  </div>
  <div class="column">
    <div class="d-flex align-items-center"> 
      <h2 class="columnTitle">TODO</h2>
      <img src="images/add_task.png" alt="Añadir tarea" width="30px" height="30px" class="d-inline-block align-text-center ms-2">
    </div>
     <div class="taskList">
      
    </div>
  </div>
  <div class="column">
    <div class="d-flex align-items-center"> 
      <h2 class="columnTitle">IN PROGRESS</h2>
      <img src="images/add_task.png" alt="Añadir tarea" width="30px" height="30px" class="d-inline-block align-text-center ms-2">
    </div>
     <div class="taskList">
      
    </div>
  </div>
  <div class="column">
    <div class="d-flex align-items-center"> 
      <h2 class="columnTitle">DONE</h2>
      <img src="images/add_task.png" alt="Añadir tarea" width="30px" height="30px" class="d-inline-block align-text-center ms-2">
    </div>
     <div class="taskList">
      
    </div>
  </div>
</div>
@endsection

@section('scripts')
  <script src="{{ asset('public/js/Tareas.js') }}"></script>
@endsection
