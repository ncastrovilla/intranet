<div class="modal fade bd-example-modal-lg" id="modal_notas-{{$a->id_alumnos}}-{{$a->id_asignatura}}" role="dialog">
    <div class="modal-dialog modal-lg">
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
                <div class="bs-callout bs-callout-info">
                <div class="box-body">
                  <?php
                    $suma = 0;
                    $notas = 0;
                    $curso = DB::table('alumnos')
                            ->join('notas','alumnos.id_alumnos','=','notas.id_alumno')
                            ->select('alumnos.nombre_alumnos','notas.nota','notas.descripcion')
                            ->where('alumnos.id_alumnos','=',$a->id_alumnos)
                            ->where('notas.id_asignatura','=',$a->id_asignatura)
                            ->get();

                    $nnotas = DB::table('alumnos')
                            ->join('notas','alumnos.id_alumnos','=','notas.id_alumno')
                            ->select('alumnos.nombre_alumnos','notas.nota','notas.descripcion')
                            ->where('alumnos.id_alumnos','=',$a->id_alumnos)
                            ->where('notas.id_asignatura','=',$a->id_asignatura)
                            ->count();

                   ?>
                   @if($nnotas!="")
                  <table class="table table-hover table-bordered">
                    <thead>
                      <tr class="encabezadotabla">
                  @foreach($curso as $e)
                  <?php 
                      $suma += $e->nota;
                      ++$notas;
                  ?>
                        <th>{{$e->descripcion}}</th>
                      @endforeach
                      <th>Promedio</th>
                      </tr>
                    </thead>
                    <tbody> 
                      <tr class="Tabla3">
                      @foreach($curso as $e)
                        <td>{{$e->nota}}</td>
                      @endforeach
                      @if($notas!=0)
                        <td>{{$suma/$notas}}</td>
                      @else
                      <td></td>
                      @endif
                      </tr>
                      <input type="hidden" name="notas" value="nota0">
                    </tbody>
                  </table>
                  @else
                  <h3>Actualmente no tienes notas en esta asignatura</h3>
                  @endif
              </div>
        </div>
    </div>
</div>
</div>
</div>