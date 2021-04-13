<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="modal_verasistencia-{{$a->id_asistencia}}" role="dialog">
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
                <th>Asistencia</th>
              </tr>
              </thead>
              <?php

                    $curso = DB::table('alumnos')
                            ->join('asistencia','alumnos.id_alumnos','=','asistencia.id_alumnos')
                            ->select('alumnos.nombre_alumnos','asistencia.presente_asistencia')
                            ->where('asistencia.id_asistencia','=',$a->id_asistencia)
                            ->get();
                   ?>
              <tbody>
               @foreach($curso as $e) 
              <tr>
                <td>{{$e->nombre_alumnos}}</td>
                @if($e->presente_asistencia=='Si')
                <td><span class="fa fa-check fa-2x" style="color:green"></span></td>
                @else
                <td><span class="fa fa-times fa-2x" style="color:red"></span></td>
                @endif
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