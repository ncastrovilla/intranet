@extends('layouts.plantilla')
@section('title', 'ver notas')
@section('contenido')

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
                        <th scope="col" style="text-align: center;">Asignatura</th>
                        <th scope="col" style="text-align: center;">Grado</th>
                        <th scope="col" style="text-align: center;">Letra</th>
                        <th scope="col" style="text-align: center;">Notas</th>
                      </tr>
                      @foreach($alumno as $a)
                        <tr>
                          <td>{{$a->nombre_asignatura}}</td>
                          <td>{{$a->grado}}</td>
                          <td>{{$a->letra}}</td>
                          
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