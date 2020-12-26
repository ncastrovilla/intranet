<div class="modal fade bd-example-modal-lg" id="modal_crearanotacion-{{$id_curso}}-{{$id_asignatura}}-{{$alumno->id_alumnos}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <?php 
                  $nombrea = DB::table('alumnos')
                            ->select('nombre_alumnos')
                            ->where('id_alumnos','=',$alumno->id_alumnos)
                            ->get();
               ?>
              @foreach($nombrea as $nombre)
              <h4 class="modal-title" align="center">
                    Nueva anotacion a {{$nombre->nombre_alumnos}}
                </h4>
              @endforeach
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
            <form action="/anotaciones/create" method="POST">
              @csrf
              <div class="modal-body">
                  <div class="box-body">
                          <div class="form-group">
                            <input type="text" name="id_curso" value="{{$id_curso}}" hidden>
                            <input type="text" name="id_asignatura" value="{{$id_asignatura}}" hidden>
                            <input type="text" name="id_alumnos" value="{{$alumno->id_alumnos}}" hidden>
                              <label for="exampleInputEmail1">
                                  Anotacion
                              </label>
                              <textarea class="form-control" name="anotacion" required></textarea>
                          </div>
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