<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="modal_subirnotas-{{$cursos}}-{{$asignatura}}-{{$dicta}}" role="dialog">
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
            <form action="/notas/upload" method="POST">
              @csrf
              <?php 
                  $alumnos = DB::table('alumnos')
                            ->join('pertenece','alumnos.id_alumnos','=','pertenece.id_alumno')
                            ->select('alumnos.id_alumnos','alumnos.nombre_alumnos')
                            ->where('pertenece.id_curso','=',$cursos)
                            ->where('pertenece.año',date('Y'))
                            ->get();

                  $ponderaciones = DB::table('ponderaciones')
                                   ->where('id_dicta',$dicta)
                                   ->get();
               ?>
              <div class="modal-body">
                  <div class="box-body">
                    <div class="form-group">
                      <label>Tipo de nota</label>
                      <select class="form-control" name="ponderacion">
                        @foreach($ponderaciones as $p)
                        <?php $cantidad = DB::table('notas')
                            ->where('id_ponderacion',$p->id_ponderacion)
                            ->distinct('descripcion')
                            ->count();
                            ?>
                        @if($cantidad < $p->cantidad && $cantidad==0)
                        <option value="{{$p->id_ponderacion}}">{{$p->descripcion_ponderacion}}</option>
                        @endif
                        @endforeach
                      </select>
                    </div>
                    <label>Descripcion de la Nota</label>
                    <input class="form-control" type="text" name="descripcion" placeholder="Descripcion"><br>
                      <input class="form-control" name="id_curso" type="hidden" value="{{$cursos}}">
                      <input class="form-control" name="id_asignatura" type="hidden" value="{{$asignatura}}">
                      <?php 
                        $profesor_id = DB::table('cuenta')
                                      ->join('dicta','dicta.id_cuenta','=','cuenta.id_cuenta')
                                      ->select('dicta.id_profesor')
                                      ->where('cuenta.id_curso','=',$cursos)
                                      ->where('cuenta.id_asignatura','=',$asignatura)
                                      ->where('dicta.año',date('Y'))
                                      ->get();
                      ?>
                      @foreach ($profesor_id as $id_profesor)
                      <input type="text" name="id_profesor" value="{{$id_profesor->id_profesor}}" hidden>
                      @endforeach
                      @foreach($alumnos as $b)
                      <div class="form-group">
                        <label for="exampleInputEmail1">{{$b->nombre_alumnos}}</label>
                        <input size="1" name="{{$b->id_alumnos}}" type="text" placeholder="Nota">
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