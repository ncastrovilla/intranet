@extends('layouts.plantilla')
@section('title', 'Material Pedagogico Profesor')
@section('contenido')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body>
<div class="row">
    <div class="col offset-md-0" style="left: 100px;">
      <h3 style="color:#2c6aa0">Material Pedagogico</h3>
    </div>
    <div class="offset-md-0">
    </div>
</div>
<div id="content-wrapper">
  <div class="row">
    <div class="col offset-sm-0" style="left: 30px;">
      <div class="bs-callout bs-callout-success">
      <a type="button" class="btn btn-info btn-sm" href="/asistencia"><i class="fas fa-arrow-left"></i></a>
          <i class="fas fan-pen-square"></i>
          <div class="card-body">
            <div class="bs-callout bs-callout-success">
              <form action="/material/upload" method="post">
                @csrf
                <input type="text" name="id_curso" value="1" hidden>
                <input type="text" name="id_asignatura" value="2" hidden>
              <div class="form-group">
                <label>Titulo</label><br>
                <input class="form-control" type="text" name="titulo" placeholder="Descripcion">
              </div>
              <div class="form-group">
                <label>Tipo de documento</label>
                <select name="tipo" class="form-control">
                  <option value="Guia">Guia</option>
                  <option value="Tarea">Tarea</option>
                  <option value="Prueba">Prueba</option>
                </select>
              </div>
              <div class="form-group">
                <label>Documento</label>
                <input type="file" name="documento" class="form-control">
              </div>
              <div class="form-group d-flex">
                <input class="btn btn-info btn-sm" type="submit" name="submit" value="Guardar">
              </div>
            </form>
            </div>
            <?php $materiales = DB::table('material')
                               ->join('curso','material.id_curso','=','curso.id_curso')
                               ->join('asignatura','material.id_asignatura','=','asignatura.id_asignatura')
                               ->get();

            ?>
            <div class="bs-callout bs-callout-warning">
                <input type="text" name="id_curso" value="1" hidden>
                <input type="text" name="id_asignatura" value="2" hidden>
                @foreach($materiales as $material)
              <div class="form-group">
                <label>Titulo</label><br>
                <input class="form-control" type="text" name="titulo" value="{{$material->titulo}}">
              </div>
              <div class="form-group">
                <label>Tipo de documento</label>
                <select name="tipo" class="form-control">
                  <option value="Guia" selected>{{$material->tipo}}</option>
                </select>
              </div>
              <div class="form-group">
                <label>Documento</label><br>
                <label>{{$material->documento}}</label>
                <a class="btn btn-info" style="width: 40px;" type="button" href="/prueba">
                                                            <i class="fas fa-download">
                                                            </i>
                                                        </a>
              </div>
              @endforeach
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</body>
</br>
@endsection