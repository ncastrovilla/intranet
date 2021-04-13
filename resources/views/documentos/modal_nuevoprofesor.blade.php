<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="modal_subirdocumento-{{$id_curso}}-{{$id_asignatura}}-{{$profesor->id_profesor}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
</style>
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Subir Documento
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
            <form action="/file/upload" enctype="multipart/form-data" method="POST">
              @csrf
              <div class="modal-body">
                  <div class="box-body">
                    <input type="text" name="id_curso" value="{{$id_curso}}" hidden="">
                    <input type="text" name="id_asignatura" value="{{$id_asignatura}}" hidden="">
                    <input type="text" name="id_profesor" value="{{$profesor->id_profesor}}" hidden="">
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Titulo documento
                              </label>
                              <input class="form-control" name="titulo" placeholder="nombres" type="text" required>
                              </input>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1"> Descripcion
                              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <input type="text" name="descripcion" class="form-control" placeholder="Descripcion">
                          </div>
                          <div class="form-group">
                            <label>Tipo documento</label>
                            <select name="tipo" class="form-control">
                              <option selected hidden>Seleccione</option>
                              <option value="Guia">Guia</option>
                              <option value="Evaluacion">Evaluacion</option>
                              <option value="Otro">Otro</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label> Archivo</label><br>
                            <input type="file" name="file"></input>
                          </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-default" data-dismiss="modal" type="button">
                      Cerrar
                  </button>
                  <button class="btn btn-social btn-primary"type="submit">
                      <i class="fa fa-new"></i>Subir
                  </button>
              </div>
            </form>
        </div>
    </div>
</div>