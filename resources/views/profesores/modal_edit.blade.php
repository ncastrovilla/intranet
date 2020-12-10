<div class="modal fade bd-example-modal-lg" id="modal_edit-{{$p->id_profesor}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Modificar datos de {{ $p->nombres_profesor.' '.$p->apellido_paterno }}
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                
            </div>
            <form action="/update" method="POST">
              @csrf
              <div class="modal-body">
                  <div class="box-body">
                      <input class="form-control" name="id" type="hidden" value="{{$p->id_profesor}}">
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Nombres
                              </label>
                              <input class="form-control" name="nombres" placeholder="nombres" type="text" value="{{ $p->nombres_profesor}}">
                              </input>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Apellidos
                              </label>
                              <input class="form-control" name="apellido_paterno" placeholder="Apellido paterno" type="text" value="{{ $p->apellido_paterno}}">
                              </input>
                          </div>
                          <div class="form-group">
                              <input class="form-control" name="apellido_materno" placeholder="Apellido materno" type="text" value="{{ $p->apellido_materno}}">
                              </input>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Rut
                              </label>
                              <input class="form-control" name="rut" placeholder="Rut" type="text" value="{{ $p->rut}}">
                              </input>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Email
                              </label>
                              <input class="form-control" name="correo" placeholder="Correo electrónico" type="email" value="{{ $p->correo}}">
                              </input>
                          </div>
                      </input>
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button">Cerrar</button>
                  <button class="btn btn-social btn-warning"type="submit">
                      <i class="fa fa-trash"></i>Modificar
                  </button>
              </div>
            </form>
        </div>
    </div>
</div>