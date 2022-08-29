@extends('adminlte::page')

@section('title', 'Dependencias')

@section('content_header')
    <h1>Alumnos en el sistema</h1>
@stop

@section('content')

<div class="card-body">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Nueva alumno
    </button>
</div>

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre alumno</th>
            <th>Dependencia</th>
            <th>Carrera</th>
            <th>Universidad</th>
            <th>Ver acta de nacimiento</th>
            <th>Ver curp</th>
            <th>Ver carta de presentación</th>
            <th>Ver comprobante de domicilio</th>
            <th>Ver boleta de calificaciones</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($alumnos as $alumno)
        <tr>
            <td>{{$alumno->ID_alum}}</td>

            <td id="algo{{$alumno->ID_alum}}" value="{{$alumno->Nom_alum}}"> 
                {{$alumno->Nom_alum}}    
            </td>

            <td id="nombreDep{{$alumno->ID_alum}}" value="{{$alumno->Nom_dep}}">       
                {{$alumno->Nom_dep}}           
            </td>

            <td id="nameCarrera{{$alumno->ID_alum}}" value="{{$alumno->Nom_carrera}}">       
                {{$alumno->Nom_carrera}}           
            </td>

            <td id="universidad{{$alumno->ID_alum}}" value="{{$alumno->universidad}}">       
                {{$alumno->universidad}}           
            </td>

            <td> <a href="{{asset('public/docs/'.$alumno->acta_nacimiento)}}" target="_blank"> Ver documento</a>  </td>

            <td> <a href="{{asset('public/docs/'.$alumno->curp)}}" target="_blank"> Ver documento</a>  </td>

            <td> <a href="{{asset('public/docs/'.$alumno->carta_presentacion)}}" target="_blank"> Ver documento</a>  </td>

            <td> <a href="{{asset('public/docs/'.$alumno->comprobante_domicilio)}}" target="_blank"> Ver documento</a>  </td>

            <td> <a href="{{asset('public/docs/'.$alumno->boleta_calificaciones)}}" target="_blank"> Ver documento</a>  </td>
            <td>
                <a href="#" data-target="#EditModal"  data-toggle="modal" onclick="recibir({{$alumno->ID_alum}});">Editar</a>
            </td>
            <td>
                <a href="{{route('deleteAlumno', $alumno ->ID_alum)}}" >Borrar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Nombre alumno</th>
            <th>Dependencia</th>
            <th>Carrera</th>
            <th>Universidad</th>
            <th>Ver acta de nacimiento</th>
            <th>Ver curp</th>
            <th>Ver carta de presentación</th>
            <th>Ver comprobante de domicilio</th>
            <th>Ver boleta de calificaciones</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    </tfoot>
</table>

    <!-- Modal nuevo alumno-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Nueva alumno</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('createAlumno')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="InputNombreAlumno">Nombre alumno</label>
                            <input type="text" class="form-control"  id="InputNombreAlumno" name="InputNombreAlumno" placeholder="Ingrese el nombre del alumno" required style="text-transform:uppercase">
                        </div>

                        <!--<div class="form-group">
                            <label for="InputFacultad">Documentos</label>
                            <input type="file" class="form-control"  id="inputDocumentos" name="inputDocumentos" accept="application/pdf">

                        </div>-->

                        <div class="form-group">
                            <label for="InputDependencia">Dependencia</label>
                            <select class="form-control form-control-lg" id="dependenciaId" name="dependenciaId">
                                @foreach($dependencias as $dependencia)
                                    <option value="{{$dependencia->ID_dep}}">{{$dependencia->Nom_dep}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="InputCarrera">Carrera</label>
                            <select class="form-control form-control-lg" id="carrerasId" name="carrerasId">
                                @foreach($carreras as $carrera)
                                    <option value="{{$carrera->ID_Carrera}}">{{$carrera->Nom_carrera}}</option>
                                @endforeach
                            </select>
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
        {   console.log(id);
            

            

            document.getElementById("IDAlumno").value = id;
            document.getElementById("IDhidden").value = id;
            
            var nombreAlumno = document.getElementById("algo"+id).innerHTML;

            document.getElementById("InputNombreAlumnoEdit").value = nombreAlumno;

        } 
    </script>



    <!-- Modal Edit -->
    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar alumno</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('updateAlumno')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="IDhidden" name="IDhidden"  value="">
                            
                            <label for="IDAlumno">ID Alumno</label>
                            <input type="text" class="form-control" id="IDAlumno" name="IDAlumno" value="" disabled>
                        </div>

                        <div class="form-group">
                            <label for="InputNombreAlumnoEdit">Nombre Alumno</label>
                            <input type="text" value="" class="form-control" id="InputNombreAlumnoEdit" name="InputNombreAlumnoEdit"  placeholder="Ingrese el nombre del alumno" required>
                        </div>

                        <!--<div class="form-group">
                            <label for="InputDocs">Documentos</label>
                            <input type="file" class="form-control"  id="InputDocs" name="InputDocs" accept="application/pdf">

                        </div>-->

                        <div class="form-group">
                            <label for="InputDependenciaEdit">Dependencia</label>
                            <select class="form-control form-control-lg" id="InputDependenciaEdit" name="InputDependenciaEdit">
                                @foreach($dependencias as $dependencia)
                                    <option value="{{$dependencia->ID_dep}}">{{$dependencia->Nom_dep}}</option>
                                @endforeach
                            </select> 
                        </div>
                        
                        <div class="form-group">
                            <label for="InputCarreraEdit">Carrera</label>
                            <select class="form-control form-control-lg" id="InputCarreraEdit" name="InputCarreraEdit">
                                @foreach($carreras as $carrera)
                                    <option value="{{$carrera->ID_Carrera}}">{{$carrera->Nom_carrera}}</option>
                                @endforeach
                            </select>
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