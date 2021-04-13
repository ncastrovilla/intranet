<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="modal_updatealumnos-{{$p->id_alumnos}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Agregar Alumno
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
            <form action="/alumnos/update" method="POST">
              @csrf
              <div class="modal-body">
                  <div class="box-body">
                    <input type="text" name="id" value="{{$p->id_alumnos}}" hidden>
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Nombres
                              </label>
                              <input class="form-control" name="nombres" value="{{$p->nombre_alumnos}}" type="text" required>
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
                              <input class="form-control" name="correo" value="{{$p->correo_alumnos}}" type="email" required>
                              </input>
                          </div>
                          <div class="form-group">
                            <label for="direccion">Direccion</label>
                            <input class="form-control" type="text" name="direccion" value="{{$p->direccion}}" required>
                          </div>
                      </input>
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