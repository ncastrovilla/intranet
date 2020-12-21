<div class="modal fade bd-example-modal-lg" id="modal_deleteevaluacion-{{$evaluacion->id_calendario}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Modificar futura evaluacion
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
            <form action="/calendario/delete" method="POST">
              @csrf
              <div class="modal-body">
                  <div class="box-body">
                          <label>¿Esta seguro que desea eliminar esta evaluacion agendada?</label>
                          <input type="text" name="id_calendario" value="{{$evaluacion->id_calendario}}" hidden>
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