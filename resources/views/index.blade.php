@extends('plantilla')

@section('title')
    Servicio Social y Prácticas Profesionales
@endsection

<!-- Contenido Section -->
@section('contenidoSection')
    <div id="contenido">
        <div id="blink">¡Bienvenidos!</div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero illo animi, explicabo commodi atque necessitatibus quaerat unde mollitia ex quae nemo quis! Repellendus explicabo sapiente, quibusdam debitis facilis nostrum ex.<p>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-indicators">
                <center> 
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </center>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <center><img src="imagenes/ss.jpg" height="400" width="1200"></center>
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="texto"> </h5>
                        <p class="texto"></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <center><img src="imagenes/índice.png" height="400" width="1200"></center> 
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="texto">?</h5>
                        <p class="texto"></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <center><img src="imagenes/practicas.jpeg" height="400" width="1200"></center> 
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="texto"></h5>
                        <p class="texto"></p>
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="cont">
        <div class="contenido">
            <h1>Mision</h1>
            <p class="pe">La mision</p>
        </div>
        <div class="contenido2">
            <h1>Vision</h1>
            <p class="pe"> La Vision</p>
        </div>
    </div>
    <h4>¡Gracias por su preferencia!</h4>
@endsection