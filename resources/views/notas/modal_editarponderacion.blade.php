<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="modal_editarponderaciones-{{$a->id_ponderacion}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Subir nueva nota al curso
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                
            </div>
            <form action="/ponderacion/editar" method="POST">
              @csrf
              <input type="text" name="id" value="{{$a->id_ponderacion}}" hidden>
              <div class="modal-body">
                  <div class="box-body">
                    <label>Descripcion de la ponderacion</label>
                    <input class="form-control" type="text" name="descripcion" value="{{$a->descripcion_ponderacion}}"><br>
                  </div>
                  <div class="form-group">
                    <label>Cantidad de notas</label>
                    <input class="form-control" type="text" name="cantidad" value="{{$a->cantidad}}">
                  </div>
                  <div class="form-group">
                    <label>Porcentaje de la ponderacion</label>
                    <input class="form-control" type="text" name="porcentaje" value="{{$a->porcentaje}}">
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button">Cerrar</button>
                  <button class="btn btn-social btn-success" type="submit">
                      <i class="fa fa-upload"></i>Modificar
                  </button>
              </div>
            </form>
        </div>
    </div>
</div>
<script>
  
</script>