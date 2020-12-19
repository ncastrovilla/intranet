<div class="modal fade bd-example-modal-lg" id="modal_notasprofesor-{{$a->id_curso}}-{{$a->id_asignatura}}-{{$a->descripcion}}" role="dialog">
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
                      <div class="col">Alumno</div>
                      <div class="col">Nota</div>
                      <div class="col">Descripcion</div>
                    </div>
                  </div>
                  <?php

                    $curso = DB::table('alumnos')
                            ->join('notas','alumnos.id_alumnos','=','notas.id_alumno')
                            ->select('alumnos.nombre_alumnos','notas.nota','notas.descripcion')
                            ->where('alumnos.id_curso','=',$a->id_curso)
                            ->where('notas.id_asignatura','=',$a->id_asignatura)
                            ->where('notas.descripcion','=',$a->descripcion)
                            ->get();

                   ?>
                  @foreach($curso as $e)
                  <div class="container">
                    <div class="row">
                      <div class="col">{{$e->nombre_alumnos}}</div><br>
                      <div class="col">{{$e->nota}}</div><br>
                      <div class="col">{{$e->descripcion}}</div><br>
                    </div>
                  </div>
                  @include('notas.modal_prueba')
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