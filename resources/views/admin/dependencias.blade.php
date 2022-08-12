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
            <th>Nombre dependencia</th>
            <th>Nombre secretaria</th>
            <th>Nombre subsecretaria</th>
            <th>Fecha creación</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    </tfoot>
</table>



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


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')


    <script> $(document).ready(function () {
        $('#example').DataTable();
    }); </script>
@stop