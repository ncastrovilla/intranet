@extends('layouts.plantilla')
@section('title', 'Asistencia profesor')
@section('contenido')

<?php
if(isset($año)){

  }else{
    if(date('m')<3){
    $año = date('Y')-1;
    $semestre = 2;
  }else{
    if(date('m')<=8){
      $año = date('Y');
      $semestre = 1;
    }else{
      $año = date('Y');
      $semestre = 2;
    }
  }
  }
 ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body>
<div class="row">
    <div class="col offset-md-1">
      <h3 style="color:#2c6aa0">Cursos</h3>
    </div>
    <div class="offset-md-1">
    </div>
</div>
<div id="content-wrapper">
  <div class="row">
        <form action="/asistencia" method="post">
          @csrf
          <div class="form-group" style="padding-left: 500px; text-align: center;">
            <label class="">Año</label>
            <input class="form-control" style="text-align: center;" name="año" type="text" value="{{$año}}">      
          </div>
          <div class="form-group" style="padding-left: 500px; text-align: center;">
            <label class="">Semestre</label>
            <input class="form-control" style="text-align: center;" name="semestre" type="text" value="{{$semestre}}">      
          </div>
          <div class="form-group" style="padding-left: 500px; text-align: center;">
            <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-search"> Buscar</i></button>      
        </div>
        </form>
  </div>
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
                        <th scope="col">Asistencia</th>
                      </tr>
                      @foreach($cursos as $curso)
                        <tr>
                          <td>{{$curso->nombre_asignatura}}</td>
                          <td>{{$curso->grado}}</td>
                          <td>{{$curso->letra}}</td>
                          <td>
                            <form action="/notas" method="post">
                              @csrf
                              <input type="text" name="id_curso" value="{{$curso->id_curso}}" hidden>
                              <input type="text" name="id_asignatura" value="{{$curso->id_asignatura}}" hidden>
                              <input type="text" name="año" value="{{$año}}" hidden>
                              <input type="text" name="semestre" value="{{$semestre}}" hidden>
                              <button type="submit" class="btn btn-info btn-sm btn-block "><i class="fas fa-info-circle"></i></button>
                            </form> 
                          </td>
                          <td>
                            <form action="/asistencia/curso" method="post">
                              @csrf
                              <input type="text" name="id_curso" value="{{$curso->id_curso}}" hidden>
                              <input type="text" name="id_profesor" value="{{$curso->id_profesor}}" hidden>
                              <input type="text" name="id_asignatura" value="{{$curso->id_asignatura}}" hidden>
                              <input type="text" name="año" value="{{$año}}" hidden>
                              <input type="text" name="semestre" value="{{$semestre}}" hidden>
                              <button type="submit" class="btn btn-info btn-sm btn-block"><i class="fas fa-book" style="color: white;"></i></button>
                            </form>
                          </td>
                        </tr>
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