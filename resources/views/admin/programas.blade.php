@extends('adminlte::page')

@section('title', 'Programas')

@section('content_header')
    <h1>Programas en el sistema</h1>
@stop

@section('content')
    
<div class="card-body">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Nuevo Programa
        </button>
    </div>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Numero</th>
                <th>Nombre del programa</th>
                <th>SS / PP</th>
                <th>Antiguedad</th>
                <th>Perfil</th>
                <th>Número estado</th>
                <th>Fecha creación</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($programas as $programa)
            <tr>
                <td>{{$programa->ID_programa}}</td>
                <td id="numeroPrograma{{$programa->ID_programa}}">{{$programa->Numero}}</td>
                <td id="namePrograma{{$programa->ID_programa}}" value="{{$programa->Nombre_pro}}">{{$programa->Nombre_pro}}</td>
                <td id="ss_ppPrograma{{$programa->ID_programa}}">{{$programa->ss_pp}}</td>
                <td id="antiguedadPrograma{{$programa->ID_programa}}">{{$programa->Antiguedad}}</td>
                <td id="perfilPrograma{{$programa->ID_programa}}">{{$programa->Perfil}}</td>
                <td id="Num_estadPrograma{{$programa->ID_programa}}">{{$programa->Num_estad}}</td>
                <td>{{$programa->created_at}}</td>
                <td>
                    <a href="#" data-target="#EditModal"  data-toggle="modal" onclick="recibir({{$programa->ID_programa}});">Editar</a>
                </td>
                <td>
                    <a href="{{route('deletePrograma', $programa->ID_programa)}}" >Borrar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Numero</th>
                <th>Nombre del programa</th>
                <th>SS / PP</th>
                <th>Antiguedad</th>
                <th>Perfil</th>
                <th>Número estado</th>
                <th>Fecha creación</th>
            </tr>
        </tfoot>
    </table>

    <!-- Modal Nuevo rol -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Nuevo programa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('createPrograma')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="InputNumero">Número</label>
                            <input type="number" class="form-control" id="InputNumero" name="InputNumero" aria-describedby="numeroHelp" placeholder="Ingrese el número del programa" required>
                        </div>

                        <div class="form-group">
                            <label for="InputName">Nombre del programa</label>
                            <input type="text" class="form-control" id="InputName" name="InputName" aria-describedby="nameHelp" placeholder="Ingrese el nombre del programa" required>
                        </div>

                        <div class="form-group">
                            <label for="InputSSPP">SS/PP</label>
                            <input type="text" class="form-control" id="InputSSPP" name="InputSSPP" aria-describedby="ssppHelp" required>
                        </div>

                        <div class="form-group">
                            <label for="AntiguedadName">Antiguedad</label>
                            <input type="text" class="form-control" id="AntiguedadName" name="AntiguedadName" aria-describedby="antiguedadHelp" placeholder="Ingresar nuevo o el folio anterior" required>
                        </div>

                        <div class="form-group">
                            <label for="InputPerfil">Perfil</label>
                            <input type="text" class="form-control" id="InputPerfil" name="InputPerfil" aria-describedby="perfilHelp" required>
                        </div>

                        <div class="form-group">
                            <label for="InputNumEstado">Numero estado</label>
                            <input type="number" class="form-control" id="InputNumEstado" name="InputNumEstado" aria-describedby="perfilHelp" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Crear Programa</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>


    <!--Js -->
    <script type="text/javascript">
        function recibir(id)
        {
            var numero = document.getElementById("numeroPrograma"+id).innerHTML;
            var name = document.getElementById("namePrograma"+id).innerHTML;
            var ss_ppPrograma = document.getElementById("ss_ppPrograma"+id).innerHTML;
            var antiguedadPrograma = document.getElementById("antiguedadPrograma"+id).innerHTML;
            var perfilPrograma = document.getElementById("perfilPrograma"+id).innerHTML;
            var Num_estadPrograma = document.getElementById("Num_estadPrograma"+id).innerHTML;

            document.getElementById("IDPrograma").value = id;
            document.getElementById("InputNumEdit").value = numero;
            document.getElementById("IDhidden").value = id;
            document.getElementById("InputNameEdit").value = name;
            document.getElementById("InputSsppEdit").value = ss_ppPrograma;
            document.getElementById("InputAntiguedadEdit").value = antiguedadPrograma;
            document.getElementById("InputPerfilEdit").value = perfilPrograma;
            document.getElementById("InputNumEstEdit").value = Num_estadPrograma;
        } 
    </script>

    <!-- Modal Edit -->
    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar programa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('updatePrograma')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="IDhidden" name="IDhidden" aria-describedby="idHelp" value="">
                            
                            <label for="IDPrograma">ID programa</label>
                            <input type="text" class="form-control" id="IDPrograma" name="IDPrograma" aria-describedby="idHelp" value="" disabled>
                        </div>
                        <div class="form-group">
                            <label for="InputNumEdit">Numero programa</label>
                            <input type="text" value="" class="form-control" id="InputNumEdit" name="InputNumEdit" aria-describedby="nameHelp" required>
                        </div>

                        <div class="form-group">
                            <label for="InputNameEdit">Nombre del programa</label>
                            <input type="text" value="" class="form-control" id="InputNameEdit" name="InputNameEdit" aria-describedby="nameHelp" placeholder="Ingrese el nombre de la categoría" required>
                        </div>

                        <div class="form-group">
                            <label for="InputSsppEdit">SS/PP</label>
                            <input type="text" value="" class="form-control" id="InputSsppEdit" name="InputSsppEdit" aria-describedby="emailHelp" placeholder="Ingrese el nombre de la categoría" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="InputAntiguedadEdit">Antiguedad</label>
                            <input type="text" value="" class="form-control" id="InputAntiguedadEdit" name="InputAntiguedadEdit" aria-describedby="emailHelp" placeholder="Ingrese el nombre de la categoría" required>
                        </div>

                        <div class="form-group">
                            <label for="InputPerfilEdit">Perfil</label>
                            <input type="text" value="" class="form-control" id="InputPerfilEdit" name="InputPerfilEdit" aria-describedby="emailHelp" placeholder="Ingrese el nombre de la categoría" required>
                        </div>

                        <div class="form-group">
                            <label for="InputNumEstEdit">Numero estado</label>
                            <input type="text" value="" class="form-control" id="InputNumEstEdit" name="InputNumEstEdit" aria-describedby="emailHelp" placeholder="Ingrese el nombre de la categoría" required>
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