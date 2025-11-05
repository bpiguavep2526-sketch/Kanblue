@extends('templates.base')

@section('title', 'Proyectos')

@section('navbar')

    <div class="d-flex align-items-center ms-auto">
        <span class="text-white small me-3"
            style="font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 20px">Usuario #1234</span>
        <div class="iconoUsuario">
            <img src="{{ asset('images/usuario.png') }}" alt="Icono Usuario" width="50" height="50">
        </div>
    </div>

@endsection

@section('content')

    <div class="d-flex justify-content-between p-3 headerProyectos">
        <h1><img src="{{ asset('images/cortana.png') }}" alt="Volver" width="50" height="50"> Bienvenido
            Usuario#1234, estos son sus proyectos actuales</h1>
        <a href="" class="btnstylenewproject btnOg"> NUEVO PROYECTO </a>
    </div>
    <div class="borderContainer">

    <div class="container text-center">

        <div class="row flex-nowrap justify-content-md-center">

            <div class="col-md-auto cardUltima">

                <div class="col-md-auto cardSegunda">

                    <div class="col-md-auto projectCard">
                        <div class="headerCard">
                            <h3>PROYECTO #42378</h3>
                            <a href=""><img src="{{ asset('images/botonEditar.png') }}" alt="Editar" class="imgEditar"></a>
                        </div>
                        <hr>
                        <ul>
                            <li>Documentación de la app HR</li>
                        </ul>
                        <div class="footerCard">
                            <a href="" class="btnstylenewproject btnOg"><strong>ABRIR PROYECTO</strong></a>
                        </div>

                    </div>

                </div>

            </div>




            <div class="col-md-auto cardUltima">

                <div class="col-md-auto cardSegunda">

                    <div class="col-md-auto projectCard">
                        <div class="headerCard">
                            <h3>PROYECTO #42378</h3>
                            <a href=""><img src="{{ asset('images/botonEditar.png') }}" alt="Editar" class="imgEditar"></a>
                        </div>
                        <hr>
                        <ul>
                            <li>Documentación de la app HR</li>
                        </ul>
                        <div class="footerCard">
                            <a href="" class="btnstylenewproject btnOg"><strong>ABRIR PROYECTO</strong></a>
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-auto cardUltima">

                <div class="col-md-auto cardSegunda">

                    <div class="col-md-auto projectCard">
                        <div class="headerCard">
                            <h3>PROYECTO #42378</h3>
                            <a href=""><img src="{{ asset('images/botonEditar.png') }}" alt="Editar" class="imgEditar"></a>
                        </div>
                        <hr>
                        <ul>
                            <li>Documentación de la app HR</li>
                        </ul>
                        <div class="footerCard">
                            <a href="" class="btnstylenewproject btnOg"><strong>ABRIR PROYECTO</strong></a>
                        </div>

                    </div>

                </div>

            </div>
        </div>

        <div class="row flex-nowrap justify-content-md-center">

            <div class="col-md-auto cardUltima">

                <div class="col-md-auto cardSegunda">

                    <div class="col-md-auto projectCard">
                        <div class="headerCard">
                            <h3>PROYECTO #42378</h3>
                            <a href=""><img src="{{ asset('images/botonEditar.png') }}" alt="Editar" class="imgEditar"></a>
                        </div>
                        <hr>
                        <ul>
                            <li>Documentación de la app HR</li>
                        </ul>
                        <div class="footerCard">
                            <a href="" class="btnstylenewproject btnOg"><strong>ABRIR PROYECTO</strong></a>
                        </div>

                    </div>

                </div>

            </div>


            <div class="col-md-auto cardUltima">

                <div class="col-md-auto cardSegunda">

                    <div class="col-md-auto projectCard">
                        <div class="headerCard">
                            <h3>PROYECTO #42378</h3>
                            <a href=""><img src="{{ asset('images/botonEditar.png') }}" alt="Editar" class="imgEditar"></a>
                        </div>
                        <hr>
                        <ul>
                            <li>Documentación de la app HR</li>
                        </ul>
                        <div class="footerCard">
                            <a href="" class="btnstylenewproject btnOg"><strong>ABRIR PROYECTO</strong></a>
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-auto cardUltima">

                <div class="col-md-auto cardSegunda">

                    <div class="col-md-auto projectCard">
                        <div class="headerCard">
                            <h3>PROYECTO #42378</h3>
                            <a href=""><img src="{{ asset('images/botonEditar.png') }}" alt="Editar" class="imgEditar"></a>
                        </div>
                        <hr>
                        <ul>
                            <li>Documentación de la app HR</li>
                        </ul>
                        <div class="footerCard">
                            <a href="" class="btnstylenewproject btnOg"><strong>ABRIR PROYECTO</strong></a>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
@endsection
