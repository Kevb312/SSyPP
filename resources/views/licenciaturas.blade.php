@extends('plantilla')

@section('title')
    Servicio Social y Prácticas Profesionales
@endsection

<!-- Contenido Section -->
@section('contenidoSection')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

<br>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Licenciaturas</h1>
        </div>
        <div class="col-12" style="padding-top:2rem;">
            <div class="dropright">
                <div class="abs-center">
                    <a class="btn btn-dark dropown-toggle" href="#" data-toggle="dropdown">
                        Área Ecónomico Administrativa
                    </a>
                    <div class="dropdown-menu">
                        <b>Facultad de Administración</b>
                        <span class="dropdown-item-text">Licenciatura en Gastronomía</span>
                        <span class="dropdown-item-text">Licenciatura en Comercio Internacional</span>
                        <span class="dropdown-item-text">Licenciatura en Administración Turística</span>
                        <span class="dropdown-item-text">Administración de Empresas</span>
                        <span class="dropdown-item-text">Administración de Negocios Internacionales</span>
                        <span class="dropdown-item-text">Administración de Pública y Gestión para el Desarrollo</span>
                        <div class="dropdown-divider"></div>
        
                        <b>Facultad de Contaduría </b>
                        <span class="dropdown-item-text">Contaduría Pública</span>
                        <span class="dropdown-item-text">Licenciatura en Administración y Dirección de Pequeñas y Medianas Empresas</span>
                        <span class="dropdown-item-text">Dirección Financiera</span>
                        <div class="dropdown-divider"></div>
        
                        <b>Economía</b>
                        <span class="dropdown-item-text">Finanzas</span>
                        <span class="dropdown-item-text">Economía</span>
                        <div class="dropdown-divider"></div>
                        
                        <b>Comunicación</b>
                        <span class="dropdown-item-text">Mercadotecnia y Medios Digitales</span>
                    </div>      
                </div>    
            </div>
        </div>

        <div class="col-12" style="padding-top:2rem;">
            <div class="dropright">
                <div class="abs-center">
                        <a class="btn btn-dark dropown-toggle" href="#" data-toggle="dropdown">
                            Área de ingenierías y ciencias exactas  
                        </a>
                        <div class="dropdown-menu">
                            <b>Facultad de Arquitectura</b>
                            <span class="dropdown-item-text">Licenciatura en Arquitectura</span>
                            <span class="dropdown-item-text">Licenciatura en Diseño Gráfico</span>
                            <span class="dropdown-item-text">Licenciatura en Urbanismo y Diseño Ambiental</span>
                            <div class="dropdown-divider"></div>

                            <b>Facultad de Ciencias de la Computación</b>
                            <div class="dropdown-divider"></div>
                            <span class="dropdown-item-text">Ingeniería en Tecnologías de la Información</span>
                            <span class="dropdown-item-text">Ingeniería en Ciencias de la Computación</span>
                            <span class="dropdown-item-text">Licenciatura en Ciencias de la Computación</span>
                            <span class="dropdown-item-text">Ingeniería en Sistemas y Tecnologías de la Información Industrial</span>  
                            <div class="dropdown-divider"></div>

                            <b>Facultad de Ciencias de la Electrónica</b>
                            <span class="dropdown-item-text">Ingeniería en Sistemas Automotrices</span>
                            <span class="dropdown-item-text">Ingeniería en Energías Renovables</span>
                            <span class="dropdown-item-text">Ingeniería en Mecatrónica</span>
                            <span class="dropdown-item-text">Licenciatura en Ciencias de la Electrónica</span>
                            <span class="dropdown-item-text">Ingeniería en Automatización y Autotrónica</span>
                            <div class="dropdown-divider"></div>

                            <b>Facultad de Ciencias Físico Matemáticas</b>
                            <span class="dropdown-item-text">Licenciatura en Actuaría</span>
                            <span class="dropdown-item-text">Licenciatura en Matemáticas Aplicadas</span>
                            <span class="dropdown-item-text">Licenciatura en Matemáticas</span>
                            <span class="dropdown-item-text">Licenciatura en Física Aplicada</span>
                            <span class="dropdown-item-text">Licenciatura en Física</span>
                            <div class="dropdown-divider"></div>

                            <b>Facultad de Ingeniería</b>
                            <span class="dropdown-item-text">Ingeniería Civil</span>
                            <span class="dropdown-item-text">Ingeniería Topográfica y Geodésica</span>
                            <span class="dropdown-item-text">Ingeniería Mecánica y Eléctrica</span>
                            <span class="dropdown-item-text">Ingeniería Industrial</span>
                            <span class="dropdown-item-text">Ingeniería Textil</span>
                            <span class="dropdown-item-text">Ingeniería Geofísica</span>
                            <span class="dropdown-item-text">Ingeniería en Procesos y Gestión Industrial</span>
                            <div class="dropdown-divider"></div>

                            <b>Facultad de Ingeniería Química</b>
                            <span class="dropdown-item-text">Ingeniería Agroindustrial</span>
                            <span class="dropdown-item-text">Ingeniería Ambiental</span>
                            <span class="dropdown-item-text">Ingeniería en Alimentos</span>
                            <span class="dropdown-item-text">Ingeniería en Materiales</span>
                            <span class="dropdown-item-text">Ingeniería Química</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12"  style="padding-top:2rem;">
            <div class="dropright">
                <div class="abs-center">
                        <a class="btn btn-dark dropown-toggle" href="#" data-toggle="dropdown">
                            Área de ciencias sociales y humanidades
                        </a>
                    <div class="dropdown-menu">
                        <b>Escuela de Artes</b>
                        <span class="dropdown-item-text">Licenciatura en Música</span>
                        <span class="dropdown-item-text">Licenciatura en Etnocoreología</span>
                        <span class="dropdown-item-text">Licenciatura en Danza</span>
                        <span class="dropdown-item-text">Licenciatura en Arte Dramático</span>

                        <div class="dropdown-divider"></div>
                        <b>Escuela de Artes Plásticas y Audiovisuales</b>
                        <span class="dropdown-item-text">Licenciatura en Artes Plásticas</span>
                        <span class="dropdown-item-text">Licenciatura en Cinematografía</span>
                        <span class="dropdown-item-text">Licenciatura en Arte Digital</span>

                        <div class="dropdown-divider"></div>
                        <b>Facultad de Ciencias de la Comunicación</b>
                        <span class="dropdown-item-text">Licenciatura en Comunicación </span>

                        <div class="dropdown-divider"></div>
                        <b>Facultad de Derecho y Ciencias Sociales</b>
                        <span class="dropdown-item-text">Licenciatura en Criminología</span>
                        <span class="dropdown-item-text">Licenciatura en Sociología</span>
                        <span class="dropdown-item-text">Licenciatura en Relaciones Internacionales</span>
                        <span class="dropdown-item-text">Licenciatura en Derecho</span>
                        <span class="dropdown-item-text">Licenciatura en Consultoría Jurídica</span>
                        <span class="dropdown-item-text">Licenciatura en Ciencias Políticas</span> 
                    </div>    
                </div>
            </div> 
        </div>

        <div class="col-12"  style="padding-top:2rem;">
            <div class="dropright">
                <div class="abs-center">
                        <a class="btn btn-dark dropown-toggle" href="#" data-toggle="dropdown">
                            Área de ciencias naturales y de salud
                        </a>
                    <div class="dropdown-menu">
                        <b>Escuela de Artes</b>
                        <span class="dropdown-item-text">Licenciatura en Música</span>
                        <span class="dropdown-item-text">Licenciatura en Etnocoreología</span>
                        <span class="dropdown-item-text">Licenciatura en Danza</span>
                        <span class="dropdown-item-text">Licenciatura en Arte Dramático</span>

                        <div class="dropdown-divider"></div>
                        <b>Escuela de Artes Plásticas y Audiovisuales</b>
                        <span class="dropdown-item-text">Licenciatura en Artes Plásticas</span>
                        <span class="dropdown-item-text">Licenciatura en Cinematografía</span>
                        <span class="dropdown-item-text">Licenciatura en Arte Digital</span>

                        <div class="dropdown-divider"></div>
                        <b>Facultad de Ciencias de la Comunicación</b>
                        <span class="dropdown-item-text">Licenciatura en Comunicación </span>

                        <div class="dropdown-divider"></div>
                        <b>Facultad de Derecho y Ciencias Sociales</b>
                        <span class="dropdown-item-text">Licenciatura en Criminología</span>
                        <span class="dropdown-item-text">Licenciatura en Sociología</span>
                        <span class="dropdown-item-text">Licenciatura en Relaciones Internacionales</span>
                        <span class="dropdown-item-text">Licenciatura en Derecho</span>
                        <span class="dropdown-item-text">Licenciatura en Consultoría Jurídica</span>
                        <span class="dropdown-item-text">Licenciatura en Ciencias Políticas</span> 
                    </div>    
                </div>
            </div> 
        </div>
    </div>
</div>

@endsection