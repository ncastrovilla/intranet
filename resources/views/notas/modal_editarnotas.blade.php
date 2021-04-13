<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="modal_editarnotas-{{$a->id_notas}}" role="dialog">
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
                            ->join('pertenece','alumnos.id_alumnos','=','pertenece.id_alumno')
                            ->select('alumnos.id_alumnos','alumnos.nombre_alumnos')
                            ->where('pertenece.id_curso','=',$a->id_curso)
                            ->where('pertenece.año',date('Y'))
                            ->get();

               ?>
              <div class="modal-body">
                  <div class="box-body">
                    <label>Descripcion de la Nota</label>
                    <input type="text" class="form-controlz" name="descripcion" value="{{$a->descripcion}}"><br><br>
                      <input class="form-control" name="id_notas" type="hidden" value="{{$a->id_notas}}">
                      <input class="form-control" name="id_curso" type="hidden" value="{{$a->id_curso}}">
                      <input class="form-control" name="id_asignatura" type="hidden" value="{{$a->id_asignatura}}">
                      @foreach($alumnos as $b)
                      <?php 
                          $descripcion = DB::table('notas')
                                      ->select('nota')
                                      ->where('id_notas','=',$a->id_notas)
                                      ->where('id_alumno','=',$b->id_alumnos)
                                      ->get();
                      ?>
                      <div class="form-group">
                        <label for="exampleInputEmail1">{{$b->nombre_alumnos}}</label>
                        @foreach($descripcion as $d)
                        @if($d->nota!="")
                        <input size="4" name="{{$b->id_alumnos}}" type="text" value="{{$d->nota}}">
                        @else
                        <input size="4" type="text" name="{{$b->id_alumnos}}">
                        @endif
                        @endforeach
                      </div>
                      @endforeach
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