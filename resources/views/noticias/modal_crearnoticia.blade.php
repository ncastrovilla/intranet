<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="modal_crearnoticia" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Nueva Noticia
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                
            </div>
            <form action="/noticia/create" enctype="multipart/form-data" method="POST">
              @csrf
              <div class="modal-body">
                  <div class="box-body">
                    <div class="form-group">
                      <label>Titulo de la noticia</label>
                      <input type="text" name="titulo" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Cuerpo de la noticia</label>
                      <textarea class="form-control" type="text-area" name="descripcion" placeholder="Descripcion de la noticia"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Imagen</label><br>
                      <input type="file" name="file"></input>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button">Cerrar</button>
                  <button class="btn btn-social btn-success" type="submit">
                      <i class="fa fa-upload"></i>Subir
                  </button>
              </div>
            </form>
        </div>
    </div>
</div>