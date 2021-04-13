<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="modal_notas-{{$a->id_alumnos}}-{{$a->id_asignatura}}" role="dialog">
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
            <?php
                    $suma = 0;
                    $notas = 0;
                    $curso = DB::table('alumnos')
                            ->join('notas','alumnos.id_alumnos','=','notas.id_alumno')
                            ->join('ponderaciones','notas.id_ponderacion','ponderaciones.id_ponderacion')
                            ->select('alumnos.nombre_alumnos','notas.nota','notas.descripcion','ponderaciones.id_ponderacion','ponderaciones.porcentaje','ponderaciones.cantidad','ponderaciones.descripcion_ponderacion')
                            ->where('alumnos.id_alumnos','=',$a->id_alumnos)
                            ->where('notas.id_asignatura','=',$a->id_asignatura)
                            ->where('notas.año','=',$año)
                            ->where('notas.semestre','=',$semestre)
                            ->get();

                    $nnotas = DB::table('alumnos')
                            ->join('notas','alumnos.id_alumnos','=','notas.id_alumno')
                            ->select('alumnos.nombre_alumnos','notas.nota','notas.descripcion')
                            ->where('alumnos.id_alumnos','=',$a->id_alumnos)
                            ->where('notas.id_asignatura','=',$a->id_asignatura)
                            ->where('notas.año','=',$año)
                            ->where('notas.semestre','=',$semestre)
                            ->count();
                            $a=0;

                   ?>
              <div class="modal-body">
                <div class="bs-callout bs-callout-info">
                <div class="box-body">
                   @if($nnotas!="")
                   <div class="bs-callout bs-callout-info">  
                   <table class="table table-hover table-bordered">
                     <thead>
                       <tr>
                        <td>Nota</td>
                        <td>Descripcion</td>
                        <td>Porcentaje</td>
                       </tr>
                     </thead>
                     <tbody>
                      @foreach($curso as $e)
                       <tr>
                        <td>{{++$a}}</td>
                        <td>{{$e->descripcion}}</td>
                        <td>{{$e->porcentaje/$e->cantidad}}%</td>
                       </tr>
                      @endforeach
                     </tbody>
                   </table>
                   </div>
                   <?php $i=0; ?>
                  <table class="table table-hover table-bordered">
                    <thead>
                      <tr class="encabezadotabla">
                  @foreach($curso as $e)
                     
                        <th>{{++$i}}</th>
                      @endforeach
                      <th>Promedio</th>
                      </tr>
                    </thead>
                    <tbody> 
                      <tr class="Tabla3">
                      @foreach($curso as $e)
                      <?php 
                    $porcentajeindividual = $e->porcentaje/$e->cantidad;
                      $nota = ($e->nota * $porcentajeindividual)/100;
                      $nota = number_format($nota,'2','.',','); 
                      $suma += $nota;
                      ++$notas;
                  ?> 
                      @if($e->nota>=4)

                            <td><span class="pull-right badge bg-blue btn-block">{{$e->nota}}</span></td>
                            @else
                            <td><span class="pull-right badge bg-red btn-block">{{$e->nota}}</span></td>
                            @endif
                      @endforeach
                      @if($notas!=0)
                      @if($suma>=4)
                            <td><span class="pull-right badge bg-blue btn-block">{{number_format($suma,1,'.',',')}}</span></td>
                            @else
                            <td><span class="pull-right badge bg-red btn-block">{{number_format($suma,1,'.',',')}}</span></td>
                            @endif
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
        <div class="modal-footer">
                  <button class="btn btn-default" data-dismiss="modal" type="button">
                      Cerrar
                  </button>
              </div>
    </div>
</div>
</div>
</div>