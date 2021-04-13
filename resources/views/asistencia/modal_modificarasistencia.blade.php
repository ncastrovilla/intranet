<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="modal_modificarasistencia-{{$a->id_asistencia}}-{{$contador}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
                <style type="text/css">
    .lbl{{$contador}}{
    display: inline-block;
    top: 2px;
    width: 65px;
    height: 33px;
    background: #979797;
    border-radius: 100px;
    cursor: pointer;
    position: relative;
    transition: .2s;
}
.lbl{{$contador}}::after{
    content: '';
    display: block;
    width: 25px;
    height: 25px;
    background: #eee;
    border-radius: 100px;
    position: absolute;
    top: 4px;
    left: 4px;
    transition: .2s;
}
<?php 
  for ($i=0; $i < 60; $i++) { 
  
?>
#switch{{$contador + $i}}:checked + .lbl{{$contador}}::after{
    left: 36px;
}
#switch{{$contador + $i}}:checked + .lbl{{$contador}}{
    background: #00C8B1;
}
#switch{{$contador.''.$i}}{
    display: none;
}
<?php }?>
</style>
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
            <form action="/asistencia/update" method="POST">
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
                              <input type="text" name="id_curso" value="{{$a->id_curso}}" hidden>
                              <input type="text" name="id_asistencia" value="{{$a->id_asistencia}}" hidden>
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
                              @if($alumno->presente_asistencia=='si' or $alumno->presente_asistencia=='Si')
                              <input type="checkbox" id="switch{{$contador + $alumno->id_alumnos}}" name="{{$alumno->id_alumnos}}" checked>
                              <label for="switch{{$contador + $alumno->id_alumnos}}" class="lbl{{$contador}}"></label>
                              @else
                              <input type="checkbox" id="switch{{$contador + $alumno->id_alumnos}}" name="{{$alumno->id_alumnos}}">
                              <label for="switch{{$contador + $alumno->id_alumnos}}" class="lbl{{$contador}}"></label>
                              @endif
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