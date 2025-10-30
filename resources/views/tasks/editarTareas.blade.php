@extends('templates.base')

@section('title', 'Editar Tareas')

@section('navbar')
  <div class="d-flex align-items-center ms-auto">
    <span class="text-white small me-3" style="font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 20px">PROYECTO #45</span>
    <div class="vr text-white me-3" style="height: 50px;"></div>
    <a href="" >    
      <img src="images/return.png.png" alt="Volver" width="30" height="30">s
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
                            <form>
                                <fieldset>
                                    <legend>TAREA #2</legend>
                                    <div class="mb-3 my-custom-style">
                                        <label for="disabledSelect" class="form-label">Asignado a: </label>
                                        <select id="disabledSelect" class="form-select center-form" holder="Usuario #32">
                                            <option>Disabled select</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 my-custom-style">
                                        <label for="disabledSelect" class="form-label">Tipo de tarea: </label>
                                        <select id="disabledSelect" class="form-select center-form-one" holder="Usuario #32">
                                            <option style="background-color: #F0E73D">Diseño</option>
                                            <option style="background-color: #7CA3F7">Desarrollo Web</option>
                                            <option style="background-color: #5BF778">Configuración</option>
                                            <option style="background-color: #EF6B54">Documentacion</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 my-custom-style">
                                        <label for="exampleFormControlTextarea1" class="form-label center-form-label">Descripción</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="7" placeholder="Escribe aquí...."></textarea>
                                    </div>
                                    <div class="mb-3 my-custom-style">
                                        <label for="disabledSelect" class="form-label">Estado</label>
                                        <select id="disabledSelect" class="form-select center-form-two" holder="TODO">
                                            <option>Todo</option>
                                            <option>Acabado</option>
                                            <option>En Progreso</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 my-custom-style">
                                        <img src="{{ asset('images/borrar2.png') }}" alt="">
                                        <label for="disabledSelect" class="form-label">Borrar Tarea</label>
                                        <label for="disabledSelect" class="form-label"></label>
                                        <button type="submit" class="btn btn-danger">ELIMINAR</button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="{{ asset('images/formasGeometricas.png') }}" alt="Formas geométricas" class="img-esquina" width="200" height="200">

@endsection