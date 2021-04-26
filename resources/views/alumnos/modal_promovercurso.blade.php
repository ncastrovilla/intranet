<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="modal_promovercurso-{{$curso->id_curso}}" role="dialog">
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

use App\Curso;

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
<?php 

   $cursos = Curso::where('id_curso','!=',$curso->id_curso)->where('grado','!=',$curso->grado)->get();
 ?>
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Promover curso
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
            <form action="/alumnos/promover" method="POST">
              @csrf
              <div class="modal-body">
                  <div class="box-body">
                    <input type="text" name="id_curso"  value="{{$curso->id_curso}}" hidden>
                    <div class="form-group">
                              <select name="curso" class="form-control">
                                @foreach($cursos as $c)
                                
                                  <option value="{{$c->id_curso}}">{{$c->grado.' '.$c->letra}}</option>
                                
                                @endforeach
                              </select>
                          </div>
                          <?php
                              $alumnos = DB::table('alumnos')
                                        ->join('pertenece','pertenece.id_alumno','=','alumnos.id_alumnos')
                                        ->where('pertenece.id_curso' ,'=',$curso->id_curso)
                                        ->where('pertenece.año',date('Y'))
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