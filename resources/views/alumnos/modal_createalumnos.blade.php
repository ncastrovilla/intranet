<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="modal_createalumnos" role="dialog">
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
            <form action="/alumnos/create" method="POST">
              @csrf
              <div class="modal-body">
                  <div class="box-body">
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Nombres
                              </label>
                              <input class="form-control" name="nombres" placeholder="nombres" type="text" required>
                              </input>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Apellidos
                              </label>
                              <input class="form-control" name="apellido_paterno" placeholder="Apellido paterno" type="text" required>
                              </input>
                          </div>
                          <div class="form-group">
                              <input class="form-control" name="apellido_materno" placeholder="Apellido materno" type="text" required>
                              </input>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Rut
                              </label>
                              <input class="form-control" name="rut" placeholder="Rut" type="text" required>
                              </input>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Email
                              </label>
                              <input class="form-control" name="correo" placeholder="Correo electrónico" type="email" required>
                              </input>
                          </div>
                          <div class="form-group">
                            <label for="direccion">Direccion</label>
                            <input class="form-control" type="text" name="direccion" placeholder="Direccion del alumno" required>
                          </div>
                          <?php 
                            $cursos = DB::table('curso')
                                      ->select('id_curso','grado','letra')
                                      ->get();
                          ?>
                          <div class="form-group">
                            <label>Curso</label>
                            <select name="id_curso">
                              @foreach($cursos as $curso)
                              <option value="{{$curso->id_curso}}">
                                {{$curso->grado.' '.$curso->letra}}
                              </option>
                              @endforeach
                            </select>
                          </div>
                      </input>
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