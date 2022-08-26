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

    <form action="home.php?c=contacto&a=guarda" method="post" class="formulario">
        <h1 class="formulario__titulo">Quejas y Sugerencias</h1>
        <input class="formulario__input" name="nombre" id="nombre"></input>
        <label for="" class="formulario__label">Nombre </label>
         
         <input class="formulario__input"name="apellido" id="apellido"></input>
        <label for="" class="formulario__label">Apellido</label>
       
         <input class="formulario__input" name="mensaje" id="mensaje"></input>
        <label for="" class="formulario__label">Mensaje</label>
         <input type="submit" class="fornulario__submit" name="enviar"></input>
    

    </form> 
    <script type="text/javascript" src="animacion.js"></script>

    
@endsection