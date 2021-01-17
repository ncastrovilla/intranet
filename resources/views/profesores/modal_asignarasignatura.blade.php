<div class="modal fade bd-example-modal-lg" id="modal_asignarasignatura-{{$p->id_profesor}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Asignar asignatura 
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                  <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
            <form action="/profesor/asignarasig" method="POST">
              <div class="modal-body">
                <div class="box-body">
                  <input class="form-control" name="id" type="hidden" value="{{$p->id_profesor}}">
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Nombre Completo
                              </label>
                              <label class="form-control">{{$p->nombres_profesor.' '.$p->apellido_paterno.' '.$p->apellido_materno}}</label>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Asignaturas
                              </label>
                          </div>
                          <?php $asignaturas = DB::table('asignatura')->get(); ?>
                          <div class="form-group">
                              <select name="asignatura">
                                @foreach($asignaturas as $asignatura)
                                <option value="{{$asignatura->id_asignatura}}">{{$asignatura->nombre_asignatura}}</option>
                                @endforeach
                              </select>
                          </div>
                          <div class="form-group">
                              <label>Curso a impartir la asignatura</label>
                          </div>
                          <?php $asignaturas = DB::table('curso')->get(); ?>
                          <div class="form-group">
                              <select name="curso">
                                @foreach($asignaturas as $asignatura)
                                <option value="{{$asignatura->id_curso}}">{{$asignatura->grado.' año '.$asignatura->letra}}</option>
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