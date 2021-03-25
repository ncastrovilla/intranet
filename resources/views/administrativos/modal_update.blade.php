<div class="modal fade bd-example-modal-lg" id="modal_update-{{$p->id_administrativo}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Agregar Administrativo
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
            <form action="/administrativos/update" method="POST">
              <input type="text" name="id" hidden value="{{$p->id_administrativo}}">
              @csrf
              <div class="modal-body">
                  <div class="box-body">
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Nombres
                              </label>
                              <input class="form-control" name="nombres" value="{{$p->nombre_administrativo}}" type="text" required>
                              </input>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Apellidos
                              </label>
                              <input class="form-control" name="apellido_paterno" value="{{$p->apellido_paterno}}" type="text" required>
                              </input>
                          </div>
                          <div class="form-group">
                              <input class="form-control" name="apellido_materno" value="{{$p->apellido_materno}}" type="text" required>
                              </input>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Rut
                              </label>
                              <input class="form-control" name="rut" value="{{$p->rut}}" type="text" required>
                              </input>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Email
                              </label>
                              <input class="form-control" name="correo" value="{{$p->correo_administrativo}}" type="email" required>
                              </input>
                          </div>
                          <div class="form-group">
                            <label for="direccion">Direccion</label>
                            <input class="form-control" type="text" name="direccion" value="{{$p->direccion_administrativo}}" required>
                          </div>
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