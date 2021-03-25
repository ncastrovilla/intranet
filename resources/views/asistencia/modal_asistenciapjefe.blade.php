<div class="modal fade bd-example-modal-lg" id="modal_asistenciapjefe-{{$asignatura->id_curso}}-{{$asignatura->id_asignatura}}" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">Asistencia</h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                  <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
              <div class="modal-body">
                <div class="box-body">
                  <table class="table table-bordered">
              <thead>  
              <tr>
                <th>Nombre alumno</th>
                <th>N° clases</th>
                <th>Asistencia</th>
              </tr>
              </thead>
              <?php

                    $curso = DB::table('alumnos')
                            ->select('nombre_alumnos','apellido_paterno','apellido_materno','id_alumnos')
                            ->where('id_curso','=',$asignatura->id_curso)
                            ->get();
                   ?>
              <tbody>
               @foreach($curso as $e) 
              <tr>
                <td>{{$e->nombre_alumnos.' '.$e->apellido_paterno.' '.$e->apellido_materno}}</td>
                <?php
                  if(date('m')<3){
                      $curso = DB::table('asistencia')
                                      ->select('fecha_asistencia','presente_asistencia')
                                      ->where('id_alumnos','=',$e->id_alumnos)
                                      ->where('id_asignatura','=',$asignatura->id_asignatura)
                                      ->orderBy('fecha_asistencia')
                                      ->wheremonth('fecha_asistencia','>=',8)
                                      ->whereyear('fecha_asistencia','=',date('Y')-1)
                                      ->get();
                  }else{
                      if(date('m')<=8){
                              $curso = DB::table('asistencia')
                                      ->select('fecha_asistencia','presente_asistencia')
                                      ->where('id_alumnos','=',$e->id_alumnos)
                                      ->where('id_asignatura','=',$asignatura->id_asignatura)
                                      ->wheremonth('fecha_asistencia','<=',8)
                                      ->whereyear('fecha_asistencia',date('Y'))
                                      ->orderBy('fecha_asistencia')
                                      ->get();
                      }else{    
                      $curso = DB::table('asistencia')
                                      ->select('fecha_asistencia','presente_asistencia')
                                      ->where('id_alumnos','=',$e->id_alumnos)
                                      ->where('id_asignatura','=',$asignatura->id_asignatura)
                                      ->wheremonth('fecha_asistencia','>',8)
                                      ->whereyear('fecha_asistencia',date('Y'))
                                      ->orderBy('fecha_asistencia')
                                      ->get();
                      }
                  }

                  $clases = count($curso);

              $esperada = 0;
              $obtenida = 0;
          foreach ($curso as $c) {
              $esperada++;
              if ($c->presente_asistencia=='Si') {
                  ++$obtenida;
              }
          }
          $porcentaje= 0 ;
          if ($esperada!=0) {
            $porcentaje = $obtenida/$esperada*100;
        }

?>
                <td>{{$clases}}</td>
                <td>{{number_format($porcentaje,'1','.',',')}}%</td>
              </tr>
              @endforeach
              </tbody>
            </table>
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