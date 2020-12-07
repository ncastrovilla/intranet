<div class="modal fade " id="modal_cursos" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Cursos</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <thead>
            <tr>
          		<th scope="col">Año</th>
          		<th scope="col">Letra</th>
          		<th colspan="3">Profesor Jefe</th>
              <th scope="col">Alumnos</th>
            </tr>
          </thead>
          <?php
          $notas = DB::table('curso')
                  ->join('profesor','curso.id_profesor','=','profesor.id')
      		        ->select('curso.id','curso.grado','curso.letra','profesor.nombres','profesor.apellido_paterno','profesor.apellido_materno')
      		        ->get();
          ?>
          @foreach($notas as $n)
          <?php
          $count = DB::table('alumnos')
          ->select('id') 
          ->where('id_curso','=',$n->id)
          ->get();
          ?>
          <tbody>
            <tr>
              <td>{{$n->grado}}</td>
              <td>{{$n->letra}}</td>
        			<td>{{$n->nombres}}</td>
              <td>{{$n->apellido_paterno}}</td>
              <td>{{$n->apellido_materno}}</td>
              <td>{{$count->count()}}</td>
            </tr>
          </tbody>
          @endforeach
        </table>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
  </div>
</div>
