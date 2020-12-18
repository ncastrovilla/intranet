@extends('layouts.index')
@section('title', 'ver notas')
@section('contenido')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body>
<div class="row">
    <div class="col offset-md-1">
      <h3 style="color:#2c6aa0">Notas</h3>
    </div>
    <div class="offset-md-1">
    </div>
</div>
<div id="content-wrapper">
  <div class="row">
    <div class="col offset-md-1">
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fan-pen-square"></i>
          <div class="card-body">
            <div class="box box-primary">
                <div class="box-body">
                  <div class="form-group">
                    <table class="table table-bordered">
                      <tr>
                        <th scope="col">Asignatura</th>
                        <th scope="col">Grado</th>
                        <th scope="col">Letra</th>
                        <th scope="col">Notas</th>
                        <th scope="col">Anotaciones</th>
                        <th scope="col">Modificar</th>
                      </tr>
                      @foreach($alumno as $a)
                        <tr>
                          <td>{{$a->nombre_asignatura}}</td>
                          <td>{{$a->grado}}</td>
                          <td>{{$a->letra}}</td>
                          <td>
                            <form action="/notas" method="post">
                              @csrf
                              <input type="text" name="id_curso" value="{{$a->id_curso}}" hidden>
                              <input type="text" name="id_asignatura" value="{{$a->id_asignatura}}" hidden>
                              <button type="submit" class="btn btn-info btn-sm btn-block "><i class="fas fa-info-circle"></i></button>
                            </form>
                          </td>
                          <td><a type="button" class="btn btn-info btn-sm btn-block " data-toggle="modal" data-target="#modal_subirnotas-{{$a->id_curso}}-{{$a->id_asignatura}}"><i class="fas fa-upload"></i></a></td>
                          <td><a type="button" class="btn btn-info btn-sm btn-block " data-toggle="modal" data-target="#modal_editarnotas-{{$a->id_curso}}-{{$a->id_asignatura}}"><i class="fas fa-upload"></i></a></td>
                        </tr>
                        @include('notas.modal_notasprofesor')
                        @include('notas.modal_subirnotas')
                        @include('notas.modal_editarnotas')
                      @endforeach
                    </table>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</br>
@endsection