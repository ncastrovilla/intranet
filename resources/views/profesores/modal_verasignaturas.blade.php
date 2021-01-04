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
                  <div class="container">
                    <div class="row" style="border: 5px groove;">
                      <div class="col" style="border: 3px groove;">Asignatura</div>
                      <div class="col" style="border: 3px groove;">Curso</div>
                    </div>
                  </div>
                  <?php $asignaturas = DB::table('cuenta')
                                       ->join('asignatura','cuenta.id_asignatura','=','asignatura.id_asignatura')
                                       ->join('curso','cuenta.id_curso','=','curso.id_curso')
                                       ->select('asignatura.nombre_asignatura','curso.grado','curso.letra')
                                       ->where('cuenta.id_profesor','=',$p->id_profesor)
                                       ->get();
                       ?>
                  @foreach($asignaturas as $asignatura)
                  <div class="container">
                    <div class="row" style="border: 5px groove;">
                      <div class="col" style="border: 3px groove;">{{$asignatura->nombre_asignatura}}</div><br>
                      <div class="col" style="border: 3px groove;">{{$asignatura->grado.' '.$asignatura->letra}}</div><br>
                      <div class="w-100"></div>
                    </div>
                  </div>
                  @endforeach
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