
<?php 
  if(auth()->user()->rol==1){
    $ruta = "/administrador/contraseña";
  }
  if(auth()->user()->rol==2){
    $ruta = "/profesor/contraseña";
  }
  if(auth()->user()->rol==3){
    $ruta = "/alumnos/contraseña";
  }
  if(auth()->user()->rol==4){
    $ruta = "/administrativo/contraseña";
  }
?><div class="modal fade bd-example-modal-lg" data-backdrop="static" id="modal_cambiarcontraseña" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Cambiar contraseña
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
            <form action="{{$ruta}}" name="con" method="POST">
              @csrf
              <div class="modal-body">
                <input type="text" name="" value="{{$ruta}}" hidden>
                  <div class="box-body">
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Contraseña anterior
                              </label>
                              <input class="form-control" name="contraseñaant"  type="password" required>
                              </input>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Contraseña nueva
                              </label>
                              <input class="form-control" name="contranueva" type="password" required>
                              </input>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">
                                  Ingrese la contraseña nuevamente
                              </label>
                              <input class="form-control" name="contranuevaagain" oninput="comprobarClave(this)" type="password" required>
                              </input>
                          </div>
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
<script>
function comprobarClave(contranuevaagain){
    var contranueva = document.con.contranueva.value ;
    var contraseña = contranuevaagain.value;
    
    if(contranueva!= contranuevaagain){
      contranuevaagain.setCustomValidity($contranueva); return false;
    }

    
}
</script>