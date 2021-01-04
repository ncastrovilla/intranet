<div class="modal fade bd-example-modal-lg" id="modal_cambiarcurso-{{$p->id_alumnos}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Cambiar Curso
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
            <form action="/alumnos/update/curso" method="POST">
              @csrf
              <div class="modal-body">
                  <div class="box-body">
                    <input type="text" name="id" value="{{$p->id_alumnos}}" hidden>
                          <div class="form-group">
                            <label>Nombre:</label>
                              <label for="exampleInputEmail1">
                                  {{$p->nombre_alumnos.' '.$p->apellido_paterno.' '.$p->apellido_materno}}
                              </label>
                          </div>
                          <div class="form-group">
                            <label>Curso:</label>
                            <label for="curso">{{$curso->grado.' año '.$curso->letra}}</label>
                          </div>
                          <?php $cursos = DB::table('curso')
                                          ->where('id_curso','>=',$curso->id_curso)
                                          ->get();
                           ?>
                          <div class="form-group">
                            <select name="cursonuevo">
                              @foreach($cursos as $curso)
                              <option value="{{$curso->id_curso}}">{{$curso->grado.' '.$curso->letra}}</option>
                              @endforeach
                            </select>
                          </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-default" data-dismiss="modal" type="button">
                      Cerrar
                  </button>
                  <button class="btn btn-social btn-warning"type="submit">
                      <i class="fa fa-new"></i>Modificar
                  </button>
              </div>
            </form>
        </div>
    </div>
</div>