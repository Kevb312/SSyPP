@extends('adminlte::page')

@section('title', 'Usuarios')

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
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td id="nameUser{{$user->id}}" value="{{$user->name}}">{{$user->name}}</td>
                <td id="nameEmail{{$user->id}}" value="{{$user->email}}">{{$user->email}}</td>
                <td>{{$user->Nombre_Rol}}</td>
                <td>
                    <a href="#" data-target="#EditModal"  data-toggle="modal" onclick="recibir({{$user->id}});">Editar</a>
                </td>
                <td>
                    <a href="{{route('deleteUser', $user->id)}}" >Borrar</a>
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
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
        </tfoot>
    </table>

    <!-- Modal Nuevo usuario -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Nuevo usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('createUser')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="InputName">Nombre usuario</label>
                            <input type="text" class="form-control" id="InputName" name="InputName" aria-describedby="nameHelp" placeholder="Ingrese el nombre de usuario" required>
                        </div>

                        <div class="form-group">
                            <label for="InputEmail">Email</label>
                            <input type="email" class="form-control" id="InputEmail" name="InputEmail" aria-describedby="emailHelp" placeholder="Ingrese el correo electronico" required>
                        </div>

                        <div class="form-group">
                            <label for="InputPass">Password</label>
                            <input type="password" class="form-control" id="InputPass" name="InputPass" aria-describedby="passHelp" placeholder="Ingrese un password" required>
                        </div>

                        <div class="form-group">
                            <label for="InputRol">Rol</label>
                            <select class="form-control" name="InputRol" id="InputRol" required>
                               
                                @foreach($roles as $rol)
                                    <option value={{$rol->ID_rol}}> {{$rol->Nombre_Rol}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Crear usuario</button>
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
            var nameEmail = document.getElementById("nameEmail"+id).innerHTML;

            document.getElementById("IDUsuario").value = id;
            document.getElementById("IDUsuariohidden").value = id;
            document.getElementById("InputNameEdit").value = name;
            document.getElementById("InputEmailEdit").value = nameEmail;
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
                <form method="post" action="{{route('updateUser')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="IDUsuariohidden" name="IDUsuariohidden" aria-describedby="idHelp" value="">
                            
                            <label for="IDUsuario">ID usuario</label>
                            <input type="text" class="form-control" id="IDUsuario" name="IDUsuario" aria-describedby="idHelp" value="" disabled>
                        </div>
                        <div class="form-group">
                            <label for="InputNameEdit">Nombre usuario</label>
                            <input type="text" value="" class="form-control" id="InputNameEdit" name="InputNameEdit" aria-describedby="nameHelp" placeholder="Ingrese el nombre de la categoría" required>
                        </div>

                        <div class="form-group">
                            <label for="InputEmailEdit">Email</label>
                            <input type="text" value="" class="form-control" id="InputEmailEdit" name="InputEmailEdit" aria-describedby="emailHelp" placeholder="Ingrese el nombre de la categoría" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="InputRolEdit">Email</label>
                            <select class="form-control" name="InputRolEdit" id="InputRolEdit" required>
                                @foreach($roles as $rol)
                                    <option value={{$rol->ID_rol}}> {{$rol->Nombre_Rol}} </option>
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')


    <script> $(document).ready(function () {
        $('#example').DataTable();
    }); </script>
@stop