@extends('templates.base')

@section('navbar')
  <div class="d-flex align-items-center ms-auto">
    <span class="text-white small me-3" style="font-family: 'Poppins', sans-serif; font-weight: 300;">PROYECTO #45</span>
    <div class="vr text-white me-3" style="height: 20px;"></div>
    <a href="" >    
      <img src="images/return.png.png" alt="Volver" width="30" height="30">
    </a>
  </div>
@endsection

@section('content') 
<div class="d-flex justify-content-end p-2">
  <button class="btnOg" style="margin-right: 20px; margin-top: 10px" >NUEVA TAREA</button>
</div>
<div class="kanbanTable">
  <div class="column">
    <div class="d-flex align-items-center"> 
      <h2 class="columnTitle">BACKLOG</h2>
      <img src="images/add_task.png" alt="Añadir tarea" width="30px" height="30px" class="d-inline-block align-text-center ms-2">
    </div>
     <div class="taskList">
      <div class="taskCard">
        <h5 class="taskTitle">Tarea de ejemplo</h5>
        <p class="taskDescription">Descripción de la tarea de ejemplo. Esta es una tarea que ha sido completada.</p>
      </div>
    </div>
  </div>
  <div class="column">
    <div class="d-flex align-items-center"> 
      <h2 class="columnTitle">TODO</h2>
      <img src="images/add_task.png" alt="Añadir tarea" width="30px" height="30px" class="d-inline-block align-text-center ms-2">
    </div>
  </div>
  <div class="column">
    <div class="d-flex align-items-center"> 
      <h2 class="columnTitle">IN PROGRESS</h2>
      <img src="images/add_task.png" alt="Añadir tarea" width="30px" height="30px" class="d-inline-block align-text-center ms-2">
    </div>
  </div>
  <div class="column">
    <div class="d-flex align-items-center"> 
      <h2 class="columnTitle">DONE</h2>
      <img src="images/add_task.png" alt="Añadir tarea" width="30px" height="30px" class="d-inline-block align-text-center ms-2">
    </div>
  </div>
</div>
@endsection
