<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    
    <script type="text/javaScript" src="javascript.js"></script>
    <title> @yield('title') </title>
  
</head>
<body>
    <a href="{{route('index')}}"><img class="imagen" src="{{asset('imagenes/logo_admi.png')}}" width="150" height="150"></a>
    <h1 class="cabezera">Servicio Social y Prácticas Profesionales</h1>
    <ul class ="menu">
      <li><a href="{{route('index')}}">Inicio</a> </li>
      <li><a href="{{route('licenciaturas')}}">Licenciaturas</a> </li>
      <li><a href="alta.html">Procedimiento de alta</a> </li>
      <li><a href="depe.html">Dependencias</a> </li>
      <li><a href="unis.html">Universidades con convenio</a> </li>
      <li><a href="sugges.html">Quejas y comentarios</a> </li>
      <li><a href={{ route('login') }}>Acceder</a> </li>
    </ul>

    <!-- Home Section -->
    @yield('contenidoSection')
    
    <!--Licenciaturas Section -->

    @yield('licenciaturaSection')
    
    <footer>
        <p>&copy;M.M.M</p>
    </footer>   
</body>
</html>