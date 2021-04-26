<style type="text/css">
    #menu * { list-style:none;}
#menu li{ line-height:180%;}
#menu li a{color:#222; text-decoration:none;}
#menu li a:before{ content:"\025b8"; color:#ddd; margin-right:4px;}
#menu input[name="list"] {
    position: absolute;
    left: -1000em;
    }
#menu label:before{ content:"\025b8"; margin-right:4px;}
#menu input:checked ~ label:before{ content:"\025be";}
#menu .interior{display: none;}
#menu input:checked ~ ul{display:block;}
</style>
<?php 
  
  use App\Dicta;
  use App\Cuenta;
  use App\Curso;
  use App\Asignatura;

?>
<div id="modal_verasignaturas-{{$p->id_profesor}}" data-backdrop="static" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Asignaturas Dictadas
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
                  <?php 
                    

                    $año = DB::table('dicta')
                          ->select('año')
                          ->where('id_profesor',$p->id_profesor)
                          ->orderBy('año','desc')
                          ->groupBy('año')
                          ->get();

                  $asignaturas = DB::table('cuenta')
                                       ->join('asignatura','cuenta.id_asignatura','=','asignatura.id_asignatura')
                                       ->join('dicta','dicta.id_cuenta','cuenta.id_cuenta')
                                       ->join('curso','cuenta.id_curso','=','curso.id_curso')
                                       ->select('asignatura.nombre_asignatura','curso.grado','curso.letra','cuenta.id_asignatura','cuenta.id_curso')
                                       ->where('dicta.id_profesor','=',$p->id_profesor)
                                       ->where('dicta.año',date('Y'))
                                       ->get();

                                       $i=1;
                                       $e=2;
                       ?>

<ul>
  @foreach($año as $a)
  <li>{{$a->año}}
    <?php
      $dicta = Dicta::where('id_profesor',$p->id_profesor)->where('año',$a->año)->get();

      $i++;
     ?>
    <ul>
      @foreach($dicta as $d)
      <?php
        $cuenta = Cuenta::where('id_cuenta',$d->id_cuenta)->first();
        $curso = Curso::where('id_curso',$cuenta->id_curso)->first();
        $asignatura = Asignatura::where('id_asignatura',$cuenta->id_asignatura)->first();
        $e++;
       ?>
      <li>{{$asignatura->nombre_asignatura.' '.$curso->grado.' '.$curso->letra}}</li>
      @endforeach
    </ul>

  </li>
  @endforeach
</ul>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button">
                  Cerrar
                </button>
                  
              </div>
            </form>
        </div>
    </div>
</div>

