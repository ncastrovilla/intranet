<div class="modal fade bd-example-modal-lg" id="modal_crearevaluacion-{{$curso}}-{{$asignatura}}-{{$profesor}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Agendar Evaluacion
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
            <form action="/calendario/create" method="POST">
              @csrf
              <div class="modal-body">
                  <div class="box-body">
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Fecha evaluacion
                              </label>
                              <input class="form-control" name="fecha" type="date" required>
                              </input>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Descripcion Evaluacion
                              </label>
                              <input class="form-control" name="descripcion_evaluacion" type="text" required>
                          </div>
                          <input type="text" name="id_curso" value="{{$curso}}" hidden>
                          <input type="text" name="id_asignatura" value="{{$asignatura}}" hidden>
                          <input type="text" name="id_profesor" value="{{$profesor}}" hidden>
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