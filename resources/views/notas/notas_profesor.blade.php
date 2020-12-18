@extends('layouts.index')
@section('title', 'Notas Profesor')
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
                        <th scope="col">Descripcion de la nota</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Ver</th>
                        <th scope="col">Modificar</th>
                      </tr>
                      @foreach($parciales as $a)
                        <tr>
                          <td>{{$a->descripcion}}</td>
                          <td>{{date("d-m-Y", strtotime($a->created_at))}}</td>
                          <td>{{$a->id_asignatura}}</td>
                          <td></td>
                          <td></td>
                          <td></td>
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