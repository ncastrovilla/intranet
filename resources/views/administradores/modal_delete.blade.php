<div class="modal fade bd-example-modal-lg" id="modal_delete-{{$p->id_administrador}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Eliminar Administrador
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
            <form action="/administradores/delete" method="POST">
              @csrf
              <div class="modal-body">
                  <div class="box-body">
                    <input type="text" name="id" value="{{$p->id_administrador}}" hidden>
                    <label>Esta seguro que desea eliminar a {{$p->nombre_administrador.' '.$p->apellido_paterno}}</label>
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