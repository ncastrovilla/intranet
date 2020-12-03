@extends('layouts.index')
@section('title', 'ver notas')
@section('contenido')
 @include('notas.modal_notas')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<div class="row">
    <div class="col offset-md-1">
      <h3 style="color:#2c6aa0">Notas</h3>
    </div>
    <div class="offset-md-1">
    </div>
</div>
<div id="content-wrapper">
    <div class="row">
      <!-- left column -->
      <div class="col offset-md-1">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
        Notas</div>

      <div class="card-body">
        <div class="table-responsive">
          <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="dataTable_length"></br></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
            <thead>
              <th>Nombre</th>
              <th>Rut</th>
              <th>Acciones</th>
            </tr>
            </thead>
            <tfoot>
            	@foreach($alumno as $asig)
					<tbody>
            <tr role="row" class="odd">
              <tr>
						<td>{{$asig -> nombre}}</td>
						<td>{{$asig -> rut}}</td>
						<td><button type="button" class="btn btn-success btn-sm btn-block " data-toggle="modal" data-target="#modal_notas"><i class="fas fa-list"></i></button></td>
            </tr>
            </tr>
					</tbody>
        
				@endforeach
            </tfoot>
        </table>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div></div>
</br>

@endsection