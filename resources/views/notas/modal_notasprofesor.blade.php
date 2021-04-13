<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="modal_notasprofesor-{{$a->id_notas}}" role="dialog">
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
                    <div class="row" style="border: 5px groove; text-align: center;">
                      <div class="col" style="border: 3px groove; text-align: center;">Alumno</div>
                      <div class="col" style="border: 3px groove; text-align: center;">Nota</div>
                      <div class="col" style="border: 3px groove; ">Hola</div>
                    </div>
                  </div>
                  <?php

                    $curso = DB::table('alumnos')
                            ->join('notas','alumnos.id_alumnos','=','notas.id_alumno')
                            ->select('alumnos.nombre_alumnos','notas.nota','notas.descripcion')
                            ->where('notas.id_notas','=',$a->id_notas)
                            ->get();

                   ?>
                  @foreach($curso as $e)
                  <div class="container">
                    <div class="row" style="border: 5px groove; text-align: center;">
                      <div class="col" style="border: 3px groove; text-align: center;">{{$e->nombre_alumnos}}</div><br>
                      <div class="col" style="border: 3px groove; text-align: center;">{{$e->nota}}</div><br>
                      <div class="col" style="border: 3px groove; text-align: center;">{{$e->descripcion}}</div><br>
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