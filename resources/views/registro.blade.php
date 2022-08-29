@extends('plantilla')

@section('title')
    Registro
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
            <form action="{{route('guardarRegistroAlumno')}}" method="post" enctype="multipart/form-data" class="formulario">
                @csrf
                    <h1 class="formulario__titulo">Registro</h1>
                    
                    <input  type="text" name="Nombre" id="Nombre" class="formulario__input" required>
                    <label for="Nombre"class="formulario__label" > Nombre completo </label>
                    <br>
                    
                    <input  type="text" name="Nomuni" id="Nomuni" class="formulario__input" required>
                    <label for="Nomuni" class="formulario__label"> Nombre de la universidad </label>
                    <br>
                    
                    <div class="form-group">
                        <label for="InputCarrera">Carrera</label>
                        <select class="form-control form-control-lg" id="carrerasId" name="carrerasId" required>
                            @foreach($carreras as $carrera)
                                <option value="{{$carrera->ID_Carrera}}" >{{$carrera->Nom_carrera}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    
                    <div class="form-group">
                        <label for="secreId">Nombre de la secretaria</label>
                        <select class="form-control form-control-lg" id="secreId" name="secreId" required >
                            @foreach($dependencias as $dependencia)
                                <option value="{{$dependencia->ID_dep}}" >{{$dependencia->Nom_secretaria}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <br>
                    <label for="actaNacimiento" >Acta de nacimiento </label>
                    <input  type="file" name="actaNacimiento" id="actaNacimiento" class="formulario__input"  accept="application/pdf" required>
                    
                    <br>
                    <label for="curp" >CURP</label>
                    <input  type="file" name="curp" id="curp" class="formulario__input"  accept="application/pdf" required>
                    <br>
                    <label for="cartaPresentacion" >Carta de presentación de la universidad </label>
                    <input  type="file" name="cartaPresentacion" id="cartaPresentacion" class="formulario__input"  accept="application/pdf" required>
                    <br>
                    <label for="comprobanteDomicilio" >Comprobante domiciliario </label>
                    <input  type="file" name="comprobanteDomicilio" id="comprobanteDomicilio" class="formulario__input"  accept="application/pdf" required>
                    <br>
                    <label for="boletaCali" >Boleta de calificaciones</label>
                    <input  type="file" name="boletaCali" id="boletaCali" class="formulario__input"  accept="application/pdf" required>
                    <br>
                    <label> Si eres estudiante BUAP</label>
                    <div class="form-group">
                        <label for="programaId">Programas</label>
                        <select class="form-control form-control-lg" id="programaId" name="programaId" required >
                            <option value="" >NO APLICA</option>
                            @foreach($programas as $programa)
                                <option value="{{$programa->ID_programa}}" >{{$programa->Nombre_pro}}</option>
                            @endforeach
                        </select>
                    </div>

                    <br>
                    <button type="submit" class="fornulario__submit"> GUARDAR</button>
            </form>

        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('error') == true )
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'Ha habido un error, intentelo más tarde.',
    })
  </script>
@endif
<!-- Si se ha editado correctamente -->
@if(session('success') == true )
    <script>
    Swal.fire(
        'Registrado',
        'Se ha registrado correctamente.',
        'success'
    )
    </script>
@endif
@endsection