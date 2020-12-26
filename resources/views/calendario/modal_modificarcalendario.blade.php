<div class="modal fade bd-example-modal-lg" id="modal_modificarcalendario-{{$evaluacion->id_curso}}-{{$evaluacion->id_asignatura}}-{{$evaluacion->id_profesor}}-{{$evaluacion->id_calendario}}" role="dialog">
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
                              <input class="form-control" name="fecha_evaluacion" type="date" value="{{$evaluacion->fecha_evaluacion}}" required>
                              </input>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Descripcion Evaluacion
                              </label>
                              <input class="form-control" name="descripcion_evaluacion" type="text" value="{{$evaluacion->descripcion_evaluacion}}" required>
                          </div>
                          <input type="text" name="id_calendario" value="{{$evaluacion->id_calendario}}" hidden>
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