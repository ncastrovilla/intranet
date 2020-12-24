<div class="modal fade bd-example-modal-lg" id="modal_notas-{{$a->id_alumnos}}-{{$a->id_asignatura}}" role="dialog">
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
                    <div class="row" style="border: 5px groove;">
                      <div class="col" style="border: 3px groove;">Nombre alumno</div>
                      <div class="col" style="border: 3px groove;">Nota</div>
                      <div class="col" style="border: 3px groove;">Descripcion</div>
                    </div>
                  </div>
                  <?php
                    $suma = 0;
                    $notas = 0;
                    $curso = DB::table('alumnos')
                            ->join('notas','alumnos.id_alumnos','=','notas.id_alumno')
                            ->select('alumnos.nombre_alumnos','notas.nota','notas.descripcion')
                            ->where('alumnos.id_alumnos','=',$a->id_alumnos)
                            ->where('notas.id_asignatura','=',$a->id_asignatura)
                            ->get();

                   ?>
                  @foreach($curso as $e)
                  <?php 
                      $suma += $e->nota;
                      ++$notas;
                  ?>
                  <div class="container">
                    <div class="row" style="border: 5px groove;">
                      <div class="col" style="border: 3px groove;">{{$e->nombre_alumnos}}</div><br>
                      <div class="col" style="border: 3px groove;">{{$e->nota}}</div><br>
                      <div class="col" style="border: 3px groove;">{{$e->descripcion}}</div><br>
                      <div class="w-100"></div>
                    </div>
                  </div>
                  @endforeach
                  <div class="container">
                    <div class="row" style="border: 3px solid;">
                      <div class="col"></div>
                      <div class="col" style="border: 3px solid;">Promedio Semestral</div>
                      @if($suma==0 OR $notas==0)
                      <div class="col" style="border: 3px solid;">0</div>
                      @else
                      <div class="col" style="border: 3px solid;">{{$suma/$notas}}</div>
                      @endif
                    </div>
                  </div>
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