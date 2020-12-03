<div class="modal fade " id="modal_notas" role="dialog">
<div class="modal-dialog modal-lg">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
    	<h4 class="modal-title">Notas Parciales</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      
      <table class="table table-bordered">
      	<thead>
      	
        	<tr>
          		<th scope="col">Nota</th>
          		<th scope="col">Descripcion</th>
          		<th scope="col">Asignatura</th>
        	</tr>
        </thead>

      	<?php

      	$notas = DB::table('notas')
      		->join('asignatura','notas.id','=','asignatura.id')
      		->select('notas.nota','notas.descripcion','asignatura.nombre')
      		->where('id_alumno','=','3')
      		->get();
      	?>
      	@foreach($notas as $n)
      	<tbody>
      		<tr>
      			<td>{{$n->nota}}</td>
      			<td>{{$n->descripcion}}</td>
      			<td>{{$n->nombre}}</td>
      		</tr>
      	</tbody>
      	@endforeach
    </table>
    </br>


    <ul class="list-group">

    </ul>



</div></div>
        <!-- /.box-body -->

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>

</div>
</div>