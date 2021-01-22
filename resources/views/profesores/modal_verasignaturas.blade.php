<div class="modal fade bd-example-modal-lg" id="modal_verasignaturas-{{$p->id_profesor}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Asignaturas 
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                  <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
            <form action="/profesor/asignarasig" method="POST">
              <div class="modal-body">
                <div class="box-body">
                  <input class="form-control" name="id" type="hidden" value="{{$p->id_profesor}}">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre Completo</label>
                    <label class="form-control">{{$p->nombres_profesor.' '.$p->apellido_paterno.' '.$p->apellido_materno}}</label>
                  </div>
                  <?php $asignaturas = DB::table('cuenta')
                                       ->join('asignatura','cuenta.id_asignatura','=','asignatura.id_asignatura')
                                       ->join('curso','cuenta.id_curso','=','curso.id_curso')
                                       ->select('asignatura.nombre_asignatura','curso.grado','curso.letra')
                                       ->where('cuenta.id_profesor','=',$p->id_profesor)
                                       ->get();
                       ?>
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Asignatura</th>
                        <th>Curso</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($asignaturas as $asignatura)
                      <tr>
                        <td>{{$asignatura->nombre_asignatura}}</td>
                        <td>{{$asignatura->grado.' '.$asignatura->letra}}</td>
                      </tr>
                  @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
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