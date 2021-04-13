    @extends('layouts.plantilla')

@section('title', 'Documentos Institucionales')  

@section('contenido')
<?php

    use App\Curso;
    use App\Asignatura;

    $curso = Curso::where('id_curso',$id_curso)->first();
    $asignatura = Asignatura::where('id_asignatura',$id_asignatura)->first();


 ?>
<!-- INDEX ADMINISTRATIVOS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<div class="page-content">
    <div class="page-header">
        <h1>
            Documentos {{$asignatura->nombre_asignatura}}
        </h1>
    </div>
        <a href="/notas/alumno" type="button" class="btn btn-info btn-sm"><i class="fas fa-arrow-left"></i> </a>
    <div class="bs-callout bs-callout-info">
        <label>Guias</label>
        <table aria-describedby="example1_info" class="table table-bordered table-hover dataTable" id="example1">
            <thead>
                <th width="20%"> Título</th>
                <th width="25%"> Descripción</th>
                <th width="20%"> Tipo</th>
                <th width="10%"> Descargar</th>
            </thead>
            <tbody>
            @foreach($documentos as $documento)
                <tr>
                    <td>{{$documento->titulo_documento}}</td>
                    <td>{{$documento->descripcion_documento}}</td>
                    <td>{{$documento->tipo_documento}}</td>
                    <td>
                        <div class="btn-group">
                            <form action="/material/alumnos/download" method="post">
                                @csrf
                                <input type="text" name="id_profesor" value="{{$profesor->id_profesor}}" hidden>
                                <input type="text" name="id_file" value="{{$documento->id_documentos}}" hidden>
                                <button class="btn btn-sm" type="submit"><i class="fa fa-download"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="bs-callout bs-callout-info">
        <label>Evaluaciones</label>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th width="20%"> Título</th>
                    <th width="25%"> Descripción</th>
                    <th width="20%">Tipo</th>
                    <th width="10%"> Descargar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($evaluacion as $documento)
                <tr>
                    <td>{{$documento->titulo_documento}}</td>
                    <td>{{$documento->descripcion_documento}}</td>
                    <td>{{$documento->tipo_documento}}</td>
                    <td>
                        <div class="btn-group">
                            <form action="/material/alumnos/download" method="post">
                                @csrf
                                <input type="text" name="id_profesor" value="{{$profesor->id_profesor}}" hidden>
                                <input type="text" name="id_file" value="{{$documento->id_documentos}}" hidden>
                                <button class="btn btn-sm" type="submit"><i class="fa fa-download"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@if(auth()->user()->rol==2)
<div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-left">
                <a class="btn btn-app" data-target="#modal_subirdocumento-{{$id_curso}}-{{$id_asignatura}}-{{$profesor->id_profesor}}" data-toggle="modal">
                    <i class="fas fa-upload"></i> Documento
                </a>
            </ul>
            @include('documentos.modal_nuevoprofesor')
            <ul class="pagination pagination-sm no-margin pull-right">
            </ul>
        </div>
@endif

@endsection
