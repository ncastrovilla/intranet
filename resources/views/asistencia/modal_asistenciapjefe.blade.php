<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="modal_asistenciapjefe-{{$asignatura->id_curso}}-{{$semestre}}-{{$año}}" role="dialog">
  <?php
      
      use App\Asistencia;

      if($semestre==1){
        $asistencia = DB::table('asistencia')
                ->select('fecha_asistencia')
                ->where('id_curso',$asignatura->id_curso)
                ->whereYear('fecha_asistencia',$año)
                ->whereMonth('fecha_asistencia','<=',8)
                ->groupBy('fecha_asistencia')
                ->get();
      }else{
        $asistencia = DB::table('asistencia')
                ->select('fecha_asistencia')
                ->where('id_curso',$asignatura->id_curso)
                ->whereYear('fecha_asistencia',$año)
                ->whereMonth('fecha_asistencia','>',8)
                ->groupBy('fecha_asistencia')
                ->get();
      }
      

    
    $alumnos = DB::table('alumnos')
              ->join('pertenece','alumnos.id_alumnos','pertenece.id_alumno')
              ->where('pertenece.id_curso',$asignatura->id_curso)
              ->where('pertenece.año',date('Y'))
              ->get();

              $n=0;
              $clasesinasistencia = 0;
        foreach ($asistencia as $a) {
          $n++;
        }
 ?>
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">Asistencia</h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                  <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
              <div class="modal-body">
                <div class="box-body">
                  @if(!$asistencia->isEmpty())
                  <table class="table table-bordered">
      <thead>
        <tr>
        <th>Alumnos</th>
      <th>Dias Totales</th>
      <th>Dias asistidos</th>
      <th>Clases Faltadas</th>
      <th>Porcentaje asistencia</th>
      <th>Notas</th>
    </tr>
      </thead>
      <tbody>
        @foreach($alumnos as $b)
        <?php 
              $asistenciass=0;
              $inasistenciass=0;
              $dasistenciass=0;
              $dinasistenciass=0;
              $clasesinas =0;
              $aux = 0;
        ?>
        <tr>
          <td>{{$b->nombre_alumnos}}</td>
          @foreach($asistencia as $a)
          <?php 
            $asistencias = Asistencia::where('id_curso',$asignatura->id_curso)->where('fecha_asistencia',$a->fecha_asistencia)->where('id_alumnos',$b->id_alumnos)->get(); 
            $count = Asistencia::where('id_curso',$asignatura->id_curso)->where('fecha_asistencia',$a->fecha_asistencia)->where('id_alumnos',$b->id_alumnos)->count();
          ?>
          @foreach($asistencias as $c)
          <?php
            if ($c->presente_asistencia=="Si") {
              $asistenciass++;
            }else{
              $inasistenciass++;
              $clasesinas++;
            }

          ?>
          @endforeach
          <?php
              $aux = $clasesinas;
          if($clasesinas == $count){
                $dinasistenciass++;
                $clasesinasistencia=$aux-$clasesinas;
              }else{
                $dasistenciass++;  
              }
              $clasesinas=0;
           ?>
          @endforeach
          <td>{{$n}}</td>
          <td>{{$dasistenciass}}</td>
          <td>{{$clasesinasistencia}}</td>
          <td>{{number_format(($dasistenciass/$n)*100,'1','.',',')}}%</td>
          <td>
            <form action="/certificado/pjefe" method="post" target="_blank">
              @csrf
              <input type="text" name="id_alumnos" value="{{$b->id_alumnos}}" hidden="">
              <button class="btn btn-sm btn-success">Notas <i class="fas fa-file"></i></button>
            </form>
          </td>
          <?php $clasesinasistencia = 0; ?>
      </tr>
        @endforeach
    </tbody>
  </table>
  @else
  <div class="bs-callout bs-callout-primary">
    <h5>El curso no presenta asistencia en ninguna asignatura hasta el momento</h5>
  </div>
  @endif

                </div>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-default" data-dismiss="modal" type="button">
                      Cerrar
                  </button>
              </div>
        </div>
    </div>
</div>