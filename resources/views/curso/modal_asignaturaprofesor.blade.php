<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="modal_asignaturaprofesor-{{$asignatura->id_cuenta}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Asignar profesor 
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                  <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
            <form action="/cursos/asignaturas/asignar" method="POST">
              <div class="modal-body">
                <div class="box-body">
                  <input type="text" name="cuenta" value="{{$asignatura->id_cuenta}}" hidden>
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Asignatura
                              </label>
                              <label class="form-control">{{$asignatura->nombre_asignatura}}</label>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Profesor
                              </label>
                          </div>
                          <?php $profesores = DB::table('profesor')->get(); ?>
                          <div class="form-group">
                              <select name="profesor" class="form-control">
                                @foreach($profesores as $asignatura)
                                <option value="{{$asignatura->id_profesor}}">{{$asignatura->nombres_profesor.' '.$profesor->apellido_paterno.' '.$profesor->apellido_materno}}</option>
                                @endforeach
                              </select>
                          </div>
                </div>
              </div>
              
              @csrf
              <div class="modal-footer">
                <button class="btn btn-social btn-warning"type="submit">
                      <i class="fa fa-trash"></i>Eliminar
                </button>
                <button class="btn btn-default" data-dismiss="modal" type="button">
                  Cerrar
                </button>
                  
              </div>
            </form>
        </div>
    </div>
</div>