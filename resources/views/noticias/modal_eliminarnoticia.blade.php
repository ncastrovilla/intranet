<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="modal_eliminarnoticia-{{$n->id_noticia}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Eliminar Noticia
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
            <form action="/noticia/delete" method="POST">
              @csrf
              <div class="modal-body">
                  <div class="box-body">
                    <input type="text" name="id" value="{{$n->id_noticia}}" hidden>
                    <label>¿Esta seguro que desea eliminar a esta noticia? {{$n->id_noticia}}</label>
                  </div>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-default" data-dismiss="modal" type="button">
                      Cerrar
                  </button>
                  <button class="btn btn-social btn-warning"type="submit">
                      <i class="fa fa-new"></i>Eliminar
                  </button>
              </div>
            </form>
        </div>
    </div>
</div>