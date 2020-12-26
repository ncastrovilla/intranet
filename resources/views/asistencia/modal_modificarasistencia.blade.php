<div class="modal fade bd-example-modal-lg" id="modal_modificarasistencia-{{$a->id_asistencia}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Modificar Asistencia
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
            <form action="/asistencia/create" method="POST">
              @csrf
              <div class="modal-body">
                  <div class="box-body">
                    <input type="text" name="id_curso"  value="{{$id_curso}}" hidden>
                    <input type="text" name="id_asignatura"  value="{{$asignatura}}" hidden>
                    <input type="text" name="id_profesor"  value="{{$profesor}}" hidden>
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Fecha Clase
                              </label>
                              <input class="form-control" name="fecha" value="{{$a->fecha_asistencia}}" type="date" required>
                              </input>
                          </div>
                          <?php
                              $alumnos = DB::table('asistencia')
                                        ->join('alumnos','asistencia.id_alumnos','=','alumnos.id_alumnos')
                                        ->select('alumnos.nombre_alumnos','alumnos.apellido_paterno','asistencia.id_asistencia','asistencia.presente_asistencia','alumnos.id_alumnos')
                                        ->where('asistencia.id_asistencia' ,'=',$a->id_asistencia)
                                        ->get();
                           ?>
                           @foreach($alumnos as $alumno)
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  {{$alumno->nombre_alumnos.' '.$alumno->apellido_paterno}}
                              </label>
                              <input  name="{{$alumno->id_alumnos}}" value="{{$alumno->presente_asistencia}}" type="text" size="2" required>
                              </input>
                          </div>
                          @endforeach
                  </div>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-default" data-dismiss="modal" type="button">
                      Cerrar
                  </button>
                  <button class="btn btn-social btn-primary"type="submit">
                      <i class="fa fa-new"></i>Crear
                  </button>
              </div>
            </form>
        </div>
    </div>
</div>