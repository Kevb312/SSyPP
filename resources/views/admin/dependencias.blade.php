@extends('adminlte::page')

@section('title', 'Dependencias')

@section('content_header')
    <h1>Dependencias en el sistema</h1>
@stop

@section('content')

<div class="card-body">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Nueva dependencia
    </button>
</div>

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre dependencia</th>
            <th>Nombre secretaria</th>
            <th>Nombre subsecretaria</th>
            <th>Fecha creación</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dependencias as $dependencia)
        <tr>
            <td>{{$dependencia->ID_dep}}</td>

            <td id="nombreDep{{$dependencia->ID_dep}}">
                {{$dependencia->Nom_dep}}
            </td>

            <td id="nombreSecre{{$dependencia->ID_dep}}" value="{{$dependencia->Nom_secretaria}}"> 
                {{$dependencia->Nom_secretaria}}    
            </td>

            <td id="nombreSub{{$dependencia->ID_dep}}" value="{{$dependencia->Nom_sub}}">       
                {{$dependencia->Nom_sub}}           
            </td>

            <td>{{$dependencia->created_at}}</td>
            <td>
                <a href="#" data-target="#EditModal"  data-toggle="modal" onclick="recibir({{$dependencia->ID_dep}});">Editar</a>
            </td>
            <td>
                <a href="{{route('deleteDependencia', $dependencia->ID_dep)}}" >Borrar</a>
            </td>
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
            <th>Borrar</th>
        </tr>
    </tfoot>
</table>

    <!-- Modal nueva dependencia-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Nueva dependencia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('createDependencia')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="InputNombre">Nombre dependencia</label>
                            <input type="text" class="form-control"  id="InputNombre" name="InputNombre" placeholder="Ingrese el nombre de la dependencia" required style="text-transform:uppercase">
                        </div>

                        <div class="form-group">
                            <label for="InputSecretaria">Secretaría</label>
                            <input type="text" class="form-control" id="InputSecretaria" name="InputSecretaria" placeholder="Ingrese el nombre de la secretaria" required style="text-transform:uppercase">
                        </div>

                        <div class="form-group">
                            <label for="InputSubSecre">Sub Secretaría</label>
                            <input type="text" class="form-control" id="InputSubSecre" name="InputSubSecre" placeholder="Ingrese el nombre de la sub secretaría" required style="text-transform:uppercase">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Crear Dependencia</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

<!--Js -->
<script type="text/javascript">
    function recibir(id)
    {
        var nombre = document.getElementById("nombreDep"+id).innerHTML;
        var nombreSecre = document.getElementById("nombreSecre"+id).innerHTML;
        var nombreSub = document.getElementById("nombreSub"+id).innerHTML;

        document.getElementById("IDDependencia").value = id;
        document.getElementById("IDhidden").value = id;
        document.getElementById("InputNameEdit").value = nombre;
        document.getElementById("InputSecreEdit").value = nombreSecre;
        document.getElementById("InputSubSecreEdit").value = nombreSub;
    } 
</script>

    <!-- Modal Edit -->
    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar dependencia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('updateDependencia')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="IDhidden" name="IDhidden"  value="">
                            
                            <label for="IDDependencia">ID dependencia</label>
                            <input type="text" class="form-control" id="IDDependencia" name="IDDependencia" value="" disabled>
                        </div>

                        <div class="form-group">
                            <label for="InputNameEdit">Nombre de la dependencia</label>
                            <input type="text" value="" class="form-control" id="InputNameEdit" name="InputNameEdit"  placeholder="Ingrese el nombre de la categoría" required>
                        </div>

                        <div class="form-group">
                            <label for="InputSecreEdit">Nombre del programa</label>
                            <input type="text" value="" class="form-control" id="InputSecreEdit" name="InputSecreEdit" placeholder="Ingrese el nombre de la categoría" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="InputSubSecreEdit">Nombre subsecretaria</label>
                            <input type="text" value="" class="form-control" id="InputSubSecreEdit" name="InputSubSecreEdit" placeholder="Ingrese el nombre de la categoría" required>
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