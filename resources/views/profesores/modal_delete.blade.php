<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="modal_delete-{{$p->id_profesor}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Eliminar profesor
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                  <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
            <form action="/eliminar" method="POST">
              <div class="modal-body">
                <div class="box-body">
                  <input type="text" name="id" hidden value="{{$p->id_profesor}}">
                  <label for="mensaje">¿Esta seguro que desea eliminar a {{$p->nombres_profesor.' '.$p->apellido_paterno.' '.$p->apellido_materno}}?</label>
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