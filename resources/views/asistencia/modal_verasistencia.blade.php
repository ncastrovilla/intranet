<div class="modal fade bd-example-modal-lg" id="modal_verasistencia-{{$a->id_asistencia}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Asistencia
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                  <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
              <div class="modal-body">
                <div class="box-body">
                  <div class="container">
                    <div class="row" style="border: 5px groove;">
                      <div class="col" style="border: 3px groove;">Nombre alumno</div>
                      <div class="col" style="border: 3px groove;">Presente</div>
                    </div>
                  </div>
                  <?php

                    $curso = DB::table('alumnos')
                            ->join('asistencia','alumnos.id_alumnos','=','asistencia.id_alumnos')
                            ->select('alumnos.nombre_alumnos','asistencia.presente_asistencia')
                            ->where('asistencia.id_asistencia','=',$a->id_asistencia)
                            ->get();
                   ?>
                  @foreach($curso as $e)
                  <div class="container">
                    <div class="row" style="border: 5px groove;">
                      <div class="col" style="border: 3px groove;">{{$e->nombre_alumnos}}</div><br>
                      <div class="col" style="border: 3px groove;">{{$e->presente_asistencia}}</div><br>
                      <div class="w-100"></div>
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