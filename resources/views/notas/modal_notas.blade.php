<div class="modal fade bd-example-modal-lg" id="modal_notas-{{$a->id_alumnos}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Notas
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                  <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
              <div class="modal-body">
                <div class="box-body">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-4">Nota</div>
                      <div class="col-md-4">Descripcion</div>
                      <div class="col-md-4">Asignatura</div>
                    </div>
                  </div>
                  @foreach($a->notas as $e)
                  <div class="container">
                    <div class="row align-items-start">
                      <div class="col">{{$e->nota}}</div>
                      <div class="col">{{$e->descripcion}}</div>
                      <div class="col">{{$e->alumno->rut}}</div>
                      <div class="w-100"></div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-default" data-dismiss="modal" type="button">
                      Cerrar
                  </button>
              </div>
        </div>
    </div>
</div>