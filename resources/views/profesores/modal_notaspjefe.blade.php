<?php
    use App\Notas;
    $semestre = 1;
                   $año = 2021;
 ?>
<div class="modal fade bd-example-modal-lg" id="modal_notaspjefe-{{$asignatura->id_curso}}-{{$asignatura->id_asignatura}}" role="dialog">
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
                   $b=0;
                    $alumnos = DB::table('alumnos')
                                         ->where('id_curso',$asignatura->id_curso)
                                         ->get();
                              $nalumnos = DB::table('alumnos')
                                         ->where('id_curso',$asignatura->id_curso)
                                         ->count();
                              $promedio_curso=0;
                         ?>
                        @foreach($alumnos as $alumno)
                        <?php
                          $nnotas = DB::table('notas')
                          ->select('nota')
                          ->where('id_curso','=',$asignatura->id_curso)
                          ->where('id_asignatura','=',$asignatura->id_asignatura)
                          ->where('id_alumno','=',$alumno->id_alumnos)
                          ->where('semestre',$semestre)
                          ->where('año',$año)
                          ->count();

                           $faltantes = Notas::where('id_alumno','=',$alumno->id_alumnos)->where('año',$año)->where('semestre',$semestre)->where('id_asignatura',$asignatura)->count();
                           $promedio = Notas::where('id_alumno','=',$alumno->id_alumnos)->where('año',$año)->where('semestre',$semestre)->where('id_asignatura',$asignatura)->avg('nota');

                           $promedio_curso+=$promedio;

                         ?>
                         @endforeach
                  @if($nnotas!=0)
                  <div class="bs-callout bs-callout-info">
                  <?php
                  $a=0;
                          $descripcion = DB::table('notas')
                          ->select('nota')
                          ->distinct()
                          ->where('id_curso','=',$asignatura->id_curso)
                          ->where('id_asignatura','=',$asignatura->id_asignatura)
                          ->where('semestre',$semestre)
                          ->where('año',$año)
                          ->get();

                          $notas = DB::table('notas')
                          ->select('descripcion')
                          ->distinct()
                          ->where('id_curso','=',$asignatura->id_curso)
                          ->where('id_asignatura','=',$asignatura->id_asignatura)
                          ->where('semestre',$semestre)
                          ->where('año',$año)
                          ->get();

                         ?>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Nota</th>
                        <th scope="col">Descripcion</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($notas as $nota)
                      <tr>
                        <td>{{++$a}}</td>
                        <td>{{$nota->descripcion}}</td>
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

                          $parciales = DB::table('notas')
                          ->select('nota')
                          ->where('id_curso','=',$asignatura->id_curso)
                          ->where('id_asignatura','=',$asignatura->id_asignatura)
                          ->where('id_alumno','=',$alumno->id_alumnos)
                          ->where('semestre',$semestre)
                          ->where('año',$año)
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
                        <td>{{$p->nota}}</td>
                        @endforeach
                        <td>{{$promedio}}</td>
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