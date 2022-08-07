@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Roles en el sistema</h1>
@stop

@section('content')
    
<div class="card-body">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Nuevo Rol
        </button>
    </div>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fecha de creación</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $rol)
            <tr>
                <td>{{$rol->ID_rol}}</td>
                <td id="nameUser{{$rol->ID_rol}}" value="{{$rol->Nombre_Rol}}">{{$rol->Nombre_Rol}}</td>
                <td>{{$rol->created_at}}</td>
                <td>
                    <a href="#" data-target="#EditModal"  data-toggle="modal" onclick="recibir({{$rol->ID_rol}});">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fecha de creación</th>
                <th>Editar</th>
            </tr>
        </tfoot>
    </table>

    <!-- Modal Nuevo rol -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Nuevo rol</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('createRol')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="InputName">Nombre rol</label>
                            <input type="text" class="form-control" id="InputName" name="InputName" aria-describedby="nameHelp" placeholder="Ingrese el nombre del rol" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Crear rol</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

    <!--Js -->
    <script type="text/javascript">
        function recibir(id)
        {
            var name = document.getElementById("nameUser"+id).innerHTML;

            document.getElementById("ID").value = id;
            document.getElementById("IDhidden").value = id;
            document.getElementById("InputNameEdit").value = name;
        } 
    </script>

    <!-- Modal Edit -->
    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('updateRol')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="IDhidden" name="IDhidden" aria-describedby="idHelp" value="">
                            
                            <label for="ID">ID rol</label>
                            <input type="text" class="form-control" id="ID" name="ID" aria-describedby="idHelp" value="" disabled>
                        </div>
                        <div class="form-group">
                            <label for="InputNameEdit">Nombre rol</label>
                            <input type="text" value="" class="form-control" id="InputNameEdit" name="InputNameEdit" aria-describedby="nameHelp" placeholder="Ingrese el nombre de la categoría" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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