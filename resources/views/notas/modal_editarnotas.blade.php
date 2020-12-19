<div class="modal fade bd-example-modal-lg" id="modal_editarnotas-{{$a->id_curso}}-{{$a->id_asignatura}}-{{$a->descripcion}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Modificar Notas
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                
            </div>
            <form action="/notas/update" method="POST">
              @csrf
              <?php 
                  $alumnos = DB::table('alumnos')
                            ->select('id_alumnos','nombre_alumnos')
                            ->where('id_curso','=',$a->id_curso)
                            ->get();
               ?>
              <div class="modal-body">
                  <div class="box-body">
                    <label>Descripcion de la Nota</label>
                      <input class="form-control" name="id_curso" type="hidden" value="{{$a->id_curso}}">
                      <input class="form-control" name="id_asignatura" type="hidden" value="{{$a->id_asignatura}}">
                      <input class="form-control" name="id_profesor" type="hidden" value="{{$a->id_profesor}}">
                      <input class="form-control" name="descripcion" type="hidden" value="{{$a->descripcion}}">
                      @foreach($alumnos as $b)
                      <?php 
                          $descripcion = DB::table('notas')
                                      ->select('nota')
                                      ->where('id_alumno','=',$b->id_alumnos)
                                      ->where('descripcion','=',$a->descripcion)
                                      ->where('id_curso','=',$a->id_curso)
                                      ->where('id_asignatura','=',$a->id_asignatura)
                                      ->get();

                      ?>
                      <div class="form-group">
                        <label for="exampleInputEmail1">{{$b->nombre_alumnos}}</label>
                        @foreach($descripcion as $d)
                        <input size="4" name="{{$b->id_alumnos}}" type="text" value="{{$d->nota}}">
                        @endforeach
                      </div>
                      @endforeach
                      <div class="form-group">
                        <label>Semestre</label>
                        <select name="semestre" required>
                            <option selected hidden>Seleccione</option>
                            <option value="1">Primer Semestre</option>
                            <option value="2">Segundo Semestre</option>
                        </select>
                        <label>Año</label>
                        <input type="text" name="año" size="4" placeholder="Año">
                      </div>
                      </input>
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button">Cerrar</button>
                  <button class="btn btn-social btn-success" type="submit">
                      <i class="fa fa-upload"></i>Subir
                  </button>
              </div>
            </form>
        </div>
    </div>
</div>