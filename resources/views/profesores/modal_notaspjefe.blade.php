<?php
    use App\Notas;
    use App\Cuenta;
    use App\Dicta;
    use App\Ponderaciones;
    use App\Profesor;
    
    if(date('m')<=8){
      $semestre = 1;
    }else{
      $semestre = 2;
    }
  
                   $año = 2021;
 ?>
<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="modal_notaspjefe-{{$asignatura->id_curso}}-{{$asignatura->id_asignatura}}" role="dialog">
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
                  @if($nnotas!=0)
                  <?php
                    $cuenta = Cuenta::where('id_curso',$asignatura->id_curso)->where('id_asignatura',$asignatura->id_asignatura)->first();

                   $dicta = Dicta::where('id_cuenta',$cuenta->id_cuenta)->where('año',date('Y'))->first();

                   $profesor = Profesor::where('id_profesor',$dicta->id_profesor)->first();

                   $pertenece = Ponderaciones::where('id_dicta',$dicta->id_dicta)->where('semestre',$semestre)->sum('cantidad');

                   $b=0;
                    $alumnos = DB::table('alumnos')
                               ->join('pertenece','pertenece.id_alumno','alumnos.id_alumnos')
                               ->where('pertenece.id_curso',$asignatura->id_curso)
                               ->where('pertenece.año',date('Y'))
                               ->get();

                    $nalumnos = DB::table('alumnos')
                                ->join('pertenece','pertenece.id_alumno','alumnos.id_alumnos')
                                ->where('pertenece.id_curso',$asignatura->id_curso)
                                ->where('pertenece.año',date('Y'))
                                ->count();


                              $promedio_curso=0;
                         ?>
                        @foreach($alumnos as $alumno)
                        <?php
                          $nnotas = DB::table('notas')
                          ->select('nota')
                          ->join('ponderaciones','notas.id_ponderacion','ponderaciones.id_ponderacion')
                          ->where('notas.id_curso','=',$asignatura->id_curso)
                          ->where('notas.id_asignatura','=',$asignatura->id_asignatura)
                          ->where('notas.id_alumno','=',$alumno->id_alumnos)
                          ->where('notas.semestre',$semestre)
                          ->where('notas.año',$año)
                          ->count();

                           $faltantes = Notas::where('id_alumno','=',$alumno->id_alumnos)->where('año',$año)->where('semestre',$semestre)->where('id_asignatura',$asignatura)->count();
                           $promedio = Notas::where('id_alumno','=',$alumno->id_alumnos)->where('año',$año)->where('semestre',$semestre)->where('id_asignatura',$asignatura)->avg('nota');

                           $promedio_curso+=$promedio;

                         ?>
                         @endforeach
                  <div class="bs-callout bs-callout-info">
                      <div class="row">
                        <div class="col-xs-12 col-lg-6">
                            <div class="form-group">
                                <label  style="color:#2c6aa0;font-family:Times new roman">Profesor: </label>
                                <label  style="color:#393939;font-family:calibri">{{$profesor->nombres_profesor.' '.$profesor->apellido_paterno.' '.$profesor->apellido_materno}}</label>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="bs-callout bs-callout-info">
                  <?php
                  $a=0;
                          $descripcion = DB::table('notas')
                          ->join('ponderaciones','notas.id_ponderacion','ponderaciones.id_ponderacion')
                          ->select('notas.nota','ponderaciones.porcentaje','ponderaciones.cantidad')
                          ->distinct()
                          ->where('notas.id_curso','=',$asignatura->id_curso)
                          ->where('notas.id_asignatura','=',$asignatura->id_asignatura)
                          ->where('notas.semestre',$semestre)
                          ->where('notas.año',$año)
                          ->get();

                          $contador = DB::table('notas')
                          ->join('ponderaciones','notas.id_ponderacion','ponderaciones.id_ponderacion')
                          ->select('notas.nota','ponderaciones.porcentaje','ponderaciones.cantidad')
                          ->distinct()
                          ->where('notas.id_curso','=',$asignatura->id_curso)
                          ->where('notas.id_asignatura','=',$asignatura->id_asignatura)
                          ->where('notas.semestre',$semestre)
                          ->where('notas.año',$año)
                          ->count();

                          $notas = DB::table('notas')
                          ->join('ponderaciones','notas.id_ponderacion','ponderaciones.id_ponderacion')
                          ->select('notas.descripcion','ponderaciones.porcentaje','ponderaciones.cantidad')
                          ->distinct()
                          ->where('notas.id_curso','=',$asignatura->id_curso)
                          ->where('notas.id_asignatura','=',$asignatura->id_asignatura)
                          ->where('notas.semestre',$semestre)
                          ->where('notas.año',$año)
                          ->get();

                         ?>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Nota</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Porcentaje</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($notas as $nota)
                      <tr>
                        <td>{{++$a}}</td>
                        <td>{{$nota->descripcion}}</td>
                        <td>{{number_format($nota->porcentaje/$nota->cantidad,'1','.',',')}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Alumno</th>
                        @for($i=0;$i<$nnotas;$i++)
                        <th scope="col">{{++$b}}</th>
                        @endfor
                        <th scope="col">Promedio</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($alumnos as $alumno)
                      <tr>
                        <td>{{$alumno->apellido_paterno.' '.$alumno->apellido_materno.' '.$alumno->nombre_alumnos}}</td>
                        <?php
                          $promedio = 0;
                          $notass = 0;
                          $parciales = DB::table('notas')
                          ->join('ponderaciones','notas.id_ponderacion','ponderaciones.id_ponderacion')
                          ->select('notas.nota','ponderaciones.porcentaje','ponderaciones.cantidad')
                          ->where('notas.id_curso','=',$asignatura->id_curso)
                          ->where('notas.id_asignatura','=',$asignatura->id_asignatura)
                          ->where('notas.id_alumno','=',$alumno->id_alumnos)
                          ->where('notas.semestre',$semestre)
                          ->where('notas.año',$año)
                          ->get();

                            $promedio = DB::table('notas')
                          ->select('nota')
                          ->where('id_curso','=',$asignatura->id_curso)
                          ->where('id_asignatura','=',$asignatura->id_asignatura)
                          ->where('id_alumno','=',$alumno->id_alumnos)
                          ->where('semestre',$semestre)
                          ->where('año',$año)
                          ->avg('nota');
                         ?>
                         @foreach($parciales as $p)
                         @if($p->nota == 'p')
                         <td>P</td>
                         @else
                        <td>{{$p->nota}}</td>
                        <?php 
                          $notass += ($p->nota*($p->porcentaje/$p->cantidad))/100;
                        ?>
                        @endif
                        @endforeach
                        @if($nnotas == $pertenece)
                        <td>{{number_format($notass,1,'.',',')}}</td>
                        @else
                        <td></td>
                        @endif
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
              </div>
              @else
              <h3>Esta asignatura no tiene notas registradas</h3>
                </div>
        </div>
              @endif
        <div class="modal-footer">
                  <button class="btn btn-default" data-dismiss="modal" type="button">
                      Cerrar
                  </button>
              </div>
    </div>
</div>
</div>
</div>