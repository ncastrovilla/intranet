@extends('layouts.index')
@section('title', 'subir notas')
@section('contenido')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<div class="row">
    <div class="col offset-md-1">
      <h3 style="color:#2c6aa0">Subir notas</h3>
    </div>
    <div class="offset-md-1">
    </div>
</div>
<div id="content-wrapper">
	<div class="row">
		<div class="col offset-md-1">
			<div class="card mb-3">
				<div class="card-header">
					<i class="fas fa-pen-square">Seleccione Curso</i>
					<div class="card-body">
						<div class="box box-primary">
							<form role="form">
								<div class="box-body">
									<div class="form-group">
										<label for="seleccionarcurso">Seleccione el curso</label>
										<input type="text" name="curso" disabled>
										<button type="button" class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#modal_notas">Curso</button>
										@include('notas.modal_notas')
									</div>
									<div class="form-group">
										<div class="row"><div class="col-sm-12">
											<table class="table table-bordered dataTable" id="myTable1" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                          						<thead>
                            						<th>Nombres</th>
                            						<th>Apellido Paterno</th>
                            						<th>Apellido Materno</th>
                            						<th>Rut</th>
                            						<th>Nota</th>
                          						</thead>

                          						<tfoot>
                            						<tr>
                              							<th rowspan="1" colspan="1">Nombre</th>
                              							<th rowspan="1" colspan="1">Apellido Paterno</th>
                              							<th rowspan="1" colspan="1">Apellido Materno</th>
                              							<th rowspan="1" colspan="1">Rut</th>
                              							<th rowspan="1" colspan="1">Nota</th>
                            						</tr>
                          						</tfoot>
                          						<tbody>
                          							<tr role="row" class="odd">
                            							<tr>
                              								<td></td>
                              								<td></td>
                              								<td></td>
                              								<td></td>
                              								<td><input type="text" size="4" name="Nota"></td>
                            							</tr>
                            						</tr>
                            					</tbody>
                        					</table>
                        				
                        				</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				
			</div>
		</div>		
	</div>
	
</div>

@endsection