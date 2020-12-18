<div class="modal fade bd-example-modal-lg" id="modal_editarnotas-{{$a->id_curso}}-{{$a->id_asignatura}}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Subir nueva nota al curso {{ $a->grado.' '.$a->letra }}
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                
            </div>
            <form action="/notas/upload" method="POST">
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
                    <select>
                      <?php 
                        $descripcion = DB::table('notas')
                                      ->select('descripcion')
                                      ->where('id_curso','=',$a->id_curso)
                                      ->where('id_asignatura','=',$a->id_asignatura)
                                      ->get();
                      ?>
                      @foreach($descripcion as $d)
                      <option>{{$d->descripcion}}</option>
                      @endforeach
                    </select>
                      <input class="form-control" name="id_curso" type="hidden" value="{{$a->id_curso}}">
                      <input class="form-control" name="id_asignatura" type="hidden" value="{{$a->id_asignatura}}">
                      <input class="form-control" name="id_profesor" type="hidden" value="{{$a->id_profesor}}">
                      @foreach($alumnos as $b)
                      <div class="form-group">
                        <label for="exampleInputEmail1">{{$b->nombre_alumnos}}</label>
                        <input size="4" name="{{$b->id_alumnos}}" type="text" placeholder="Nota">
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