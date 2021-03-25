<div id="modal_verasignaturas-{{$p->id_profesor}}" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                       ->select('asignatura.nombre_asignatura','curso.grado','curso.letra','cuenta.id_asignatura','cuenta.id_curso')
                                       ->where('cuenta.id_profesor','=',$p->id_profesor)
                                       ->get();
                       ?>
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Asignatura</th>
                        <th>Curso</th>
                        <th>Asignar</th>
                        <th>Modificar</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($asignaturas as $asignatura)
                      <tr>
                        <td>{{$asignatura->nombre_asignatura}}</td>
                        <td>{{$asignatura->grado.' '.$asignatura->letra}}</td>
                        <td> <a href="#myModal1" role="button" class="btn btn-primary" data-toggle="modal">Launch other modal 1</a></td>
                        <td><a href="#myModal2-{{$p->id_profesor}}-{{$asignatura->id_curso}}" type="button" class="btn btn-info btn-block" data-toggle="modal">Modificar</a></td>
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

<!-- Modal asignar asignatura -->
<div id="myModal1" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#myModal">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Asignar asignatura 
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
                              <label for="exampleInputEmail1">
                                  Nombre Completo
                              </label>
                              <label class="form-control">{{$p->nombres_profesor.' '.$p->apellido_paterno.' '.$p->apellido_materno}}</label>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Asignaturas
                              </label>
                          </div>
                          
                          <div class="form-group">
                              <label>Curso a impartir la asignatura</label>
                          </div>
                          <?php $asignaturas = DB::table('curso')->get(); ?>
                          <div class="form-group">
                              <select name="curso">
                                @foreach($asignaturas as $asignatura)
                                <option value="{{$asignatura->id_curso}}">{{$asignatura->grado.' año '.$asignatura->letra}}</option>
                                @endforeach
                              </select>
                          </div>
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

<div id="myModal2-{{$p->id_profesor}}-{{$asignatura->id_curso}}" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#myModal">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modificar asignatura</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="/profesor/modificarasig" method="POST">
              <div class="modal-body">
                <div class="box-body">
                  <input class="form-control" name="id" type="hidden" value="{{$p->id_profesor}}">
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Nombre Completo
                              </label>
                              <label class="form-control">{{$p->nombres_profesor.' '.$p->apellido_paterno.' '.$p->apellido_materno}}</label>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Asignaturas
                              </label>
                          </div>
                          
                          <div class="form-group">
                              <label>Curso a impartir la asignatura</label>
                          </div>
                          <div class="form-group">
                              <label>{{$asignatura->id_curso}}</label>
                          </div>
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