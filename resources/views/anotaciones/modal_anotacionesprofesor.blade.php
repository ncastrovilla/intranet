<div class="modal fade bd-example-modal-lg" id="modal_anotacionesprofesor-{{$id_curso}}-{{$id_asignatura}}-{{$alumno->id_alumnos}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Notas
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                  <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
              <div class="modal-body">
                <div class="box-body">
                  <div class="container">
                    <div class="row">
                      <div class="col">Asignatura</div>
                      <div class="col">Fecha</div>
                      <div class="col">Hora</div>
                    </div>
                  </div>
                  <?php 
                  $anotaciones = DB::table('anotaciones')
                               ->join('asignatura','anotaciones.id_asignatura','=','asignatura.id_asignatura')
                               ->where('anotaciones.id_alumno','=',$alumno->id_alumnos)
                               ->where('anotaciones.id_curso','=',$id_curso)
                               ->where('anotaciones.id_asignatura','=',$id_asignatura)
                               ->select('anotaciones.fecha_anotacion','anotaciones.hora_anotacion','asignatura.nombre_asignatura')
                               ->get();
                  ?>
                  @foreach($anotaciones as $anotacion)
                  <div class="container">
                    <div class="row">
                      <div class="col">{{$anotacion->nombre_asignatura}}</div><br>
                      <div class="col">{{$anotacion->fecha_anotacion}}</div><br>
                      <div class="col">{{$anotacion->hora_anotacion}}</div><br>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-default" data-dismiss="modal" type="button">
                      Cerrar
                  </button>
              </div>
        </div>
    </div>
</div>