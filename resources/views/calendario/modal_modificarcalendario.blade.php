<?php
use App\Profesor;
  $profesor = Profesor::where('rut',auth()->user()->rut)->first();

    $cursos = DB::table('cuenta')
        ->join('dicta','cuenta.id_cuenta','dicta.id_cuenta')
        ->join('asignatura','cuenta.id_asignatura','=','asignatura.id_asignatura')
        ->join('curso','cuenta.id_curso','=','curso.id_curso')
        ->select('cuenta.id_cuenta','dicta.id_profesor','curso.id_curso','curso.grado','curso.letra','asignatura.nombre_asignatura')
        ->where('dicta.id_profesor','=',$profesor->id_profesor)
        ->where('dicta.año',date('Y'))
        ->get();

 ?>

<div class="modal fade bd-example-modal-lg" id="modal_modificarcalendario" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Modificar futura evaluacion
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
            <form action="/calendario/update" method="POST">
              @csrf
              <div class="modal-body">
                  <div class="box-body">
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Fecha evaluacion
                              </label>
                              <input class="form-control" id="fechaupdate" name="fecha_evaluacion" type="date" value="" required>
                              </input>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Descripcion Evaluacion
                              </label>
                              <input class="form-control" id="descripcionupdate" name="descripcion_evaluacion" type="text"  required>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Curso
                              </label>
                              <span class="form-control" id="cursoant" name="cursoant" type="text" required>
                          </div>
                          <div class="form-group">
                              <select name="curso" class="form-control">
                                <option value="0" hidden>Sin Cambios</option>
                                @foreach($cursos as $curso)
                                <option value="{{$curso->id_cuenta}}">{{$curso->nombre_asignatura.' '.$curso->grado.' '.$curso->letra}}</option>
                                @endforeach
                              </select>
                          </div>
                          <input type="text" name="id_calendario" id="idupdate"  hidden>
                      </input>
                  </div>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-default" data-dismiss="modal" type="button">
                      Cerrar
                  </button>
                  <button class="btn btn-social btn-warning"type="submit">
                      <i class="fa fa-new"></i>Crear
                  </button>
              </div>
            </form>
        </div>
    </div>
</div>