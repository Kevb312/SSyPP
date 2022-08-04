@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
    
<div class="card-body">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Nuevo usuario
        </button>
    </div>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td id="nameUser{{$user->id}}" value="{{$user->name}}">{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->Nombre_rol}}</td>
                <td>
                    <a href="#" data-target="#EditModal"  data-toggle="modal" onclick="recibir({{$user->id}});">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Nuevo usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="InputName">Nombre usuario</label>
                            <input type="text" class="form-control" id="InputName" name="InputName" aria-describedby="nameHelp" placeholder="Ingrese el nombre de usuario">
                        </div>

                        <div class="form-group">
                            <label for="InputName">Email</label>
                            <input type="email" class="form-control" id="InputEmail" name="InputEmail" aria-describedby="emailHelp" placeholder="Ingrese el correo electronico">
                        </div>

                        <div class="form-group">
                            <label for="InputName">Password</label>
                            <input type="password" class="form-control" id="InputPass" name="InputPass" aria-describedby="passHelp" placeholder="Ingrese un password">
                        </div>

                        <div class="form-group">
                            <label for="InputName">Rol</label>
                            <select class="form-control" name="InputRol" id="InputRol">
                                @foreach($roles as $rol)
                                    <option value={{$rol->ID_rol}}> {{$rol->Nombre_rol}} </option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
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

            document.getElementById("IDUsuario").value = id;
            document.getElementById("IDUsuariohidden").value = id;
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
                <form method="post" action="">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="IDUsuariohidden" name="IDUsuariohidden" aria-describedby="emailHelp" value="">
                            
                            <label for="IDUsuario">ID usuario</label>
                            <input type="text" class="form-control" id="IDUsuario" name="IDUsuario" aria-describedby="emailHelp" value="" disabled>
                        </div>
                        <div class="form-group">
                        <label for="InputNameEdit">Nombre usuario</label>
                        <input type="text" value="" class="form-control" id="InputNameEdit" name="InputNameEdit" aria-describedby="emailHelp" placeholder="Ingrese el nombre de la categoría">
                        </div>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
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