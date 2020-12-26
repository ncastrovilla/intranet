<div class="modal fade bd-example-modal-lg" id="modal_subirasistencia-{{$id_curso}}-{{$asignatura}}-{{$profesor}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <style type="text/css">
    .lbl{
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
.lbl::after{
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
#switch{{$i}}:checked + .lbl::after{
    left: 36px;
}
#switch{{$i}}:checked + .lbl{
    background: #00C8B1;
}
#switch{{$i}}{
    display: none;
}
<?php }?>
</style>
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Subir Asistencia
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
                              <input class="form-control" name="fecha" placeholder="nombres" type="date" required>
                              </input>
                          </div>
                          <?php
                              $alumnos = DB::table('alumnos')
                                        ->where('id_curso' ,'=',$id_curso)
                                        ->get();
                           ?>
                           @foreach($alumnos as $alumno)
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  {{$alumno->nombre_alumnos.' '.$alumno->apellido_paterno}}
                              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <input type="checkbox" id="switch{{$alumno->id_alumnos}}" name="{{$alumno->id_alumnos}}">
                              <label for="switch{{$alumno->id_alumnos}}" class="lbl"></label>
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