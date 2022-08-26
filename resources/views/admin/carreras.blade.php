@extends('adminlte::page')

@section('title', 'Dependencias')

@section('content_header')
    <h1>Carreras en el sistema</h1>
@stop

@section('content')

<div class="card-body">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Nueva carrera
    </button>
</div>

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre área</th>
            <th>Facultad</th>
            <th>Nombre carrera</th>
            <th>Fecha creación</th>
            <th>Editar</th>
            <!--<th>Borrar</th>-->
        </tr>
    </thead>
    <tbody>
        @foreach($carreras as $carrera)
        <tr>
            <td>{{$carrera->ID_Carrera}}</td>

            <td id="nombreArea{{$carrera->ID_Carrera}}">
                {{$carrera->Nom_area}}
            </td>

            <td id="nombreFacultad{{$carrera->ID_Carrera}}" value="{{$carrera->Facultad}}"> 
                {{$carrera->Facultad}}    
            </td>

            <td id="nombreCarrera{{$carrera->ID_Carrera}}" value="{{$carrera->Nom_carrera}}">       
                {{$carrera->Nom_carrera}}           
            </td>

            <td>{{$carrera->created_at}}</td>
            <td>
                <a href="#" data-target="#EditModal"  data-toggle="modal" onclick="recibir({{$carrera->ID_Carrera}});">Editar</a>
            </td>
            <!--<td>
                <a href="{{route('deleteCarrera', $carrera ->ID_Carrera)}}" >Borrar</a>
            </td>-->
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Nombre dependencia</th>
            <th>Nombre secretaria</th>
            <th>Nombre subsecretaria</th>
            <th>Fecha creación</th>
            <th>Editar</th>
            <!--<th>Borrar</th>-->
        </tr>
    </tfoot>
</table>

    <!-- Modal nueva carrera-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Nueva carrera</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('createCarrera')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="InputNombreArea">Nombre área</label>
                            <input type="text" class="form-control"  id="InputNombreArea" name="InputNombreArea" placeholder="Ingrese el nombre del área" required style="text-transform:uppercase">
                        </div>

                        <div class="form-group">
                            <label for="InputFacultad">Facultad</label>
                            <input type="text" class="form-control" id="InputFacultad" name="InputFacultad" placeholder="Ingrese el nombre de la facultad" required style="text-transform:uppercase">
                        </div>

                        <div class="form-group">
                            <label for="InputNombreCarrera">Nombre de la carrera</label>
                            <input type="text" class="form-control" id="InputNombreCarrera" name="InputNombreCarrera" placeholder="Ingrese el nombre de la carrera" required style="text-transform:uppercase">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Crear Carrera</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

<!--Js -->
<script type="text/javascript">
    function recibir(id)
    {
        var nombreArea = document.getElementById("nombreArea"+id).innerHTML;
        var nombreFacultad = document.getElementById("nombreFacultad"+id).innerHTML;
        var nombreCarrera = document.getElementById("nombreCarrera"+id).innerHTML;

        document.getElementById("IDCarrera").value = id;
        document.getElementById("IDhidden").value = id;
        
        document.getElementById("InputNombreAreaEdit").value = nombreArea;
        document.getElementById("InputFacultadEdit").value = nombreFacultad;
        document.getElementById("InputCarreraEdit").value = nombreCarrera;
    } 
</script>



    <!-- Modal Edit -->
    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar carrera</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('updateCarrera')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="IDhidden" name="IDhidden"  value="">
                            
                            <label for="IDCarrera">ID Carrera</label>
                            <input type="text" class="form-control" id="IDCarrera" name="IDCarrera" value="" disabled>
                        </div>

                        <div class="form-group">
                            <label for="InputNombreAreaEdit">Nombre área</label>
                            <input type="text" value="" class="form-control" id="InputNombreAreaEdit" name="InputNombreAreaEdit"  placeholder="Ingrese el nombre de la área" required>
                        </div>

                        <div class="form-group">
                            <label for="InputFacultadEdit">Facultad</label>
                            <input type="text" value="" class="form-control" id="InputFacultadEdit" name="InputFacultadEdit" placeholder="Ingrese el nombre de la facultad" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="InputCarreraEdit">Nombre de la carrera</label>
                            <input type="text" value="" class="form-control" id="InputCarreraEdit" name="InputCarreraEdit" placeholder="Ingrese el nombre de la carrera" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')


    <script> $(document).ready(function () {
        $('#example').DataTable();
    }); </script>
@stop