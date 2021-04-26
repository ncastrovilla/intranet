@extends('layouts.plantilla')
<?php
      
      use App\Asistencia;

      

    

    $asistencia = DB::table('asistencia')
                ->select('fecha_asistencia')
                ->where('id_curso',1)
                ->whereYear('fecha_asistencia',date('Y'))
                ->whereMonth('fecha_asistencia','<=',date('m'))
                ->groupBy('fecha_asistencia')
                ->get();
    $alumnos = DB::table('alumnos')
              ->join('pertenece','alumnos.id_alumnos','pertenece.id_alumno')
              ->where('pertenece.id_curso',1)
              ->where('pertenece.año',date('Y'))
              ->get();

              $n=0;
              $clasesinasistencia;
        foreach ($asistencia as $a) {
          $n++;
        }
        $descripcion = DB::table('notas')
                                      ->select('nota')
                                      ->where('id_notas','=',4)
                                      ->where('id_alumno','=',17)
                                      ->get();
        
    
 ?>
<html lang='en'>
  <head>
    <meta charset='utf-8' />

   <link href='../fullcalendar/packages/core/main.css' rel='stylesheet' />
  <link href='../fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
  <link href='../fullcalendar/packages/timegrid/main.css' rel='stylesheet' />

    <script src='../fullcalendar/packages/core/main.js'></script>
<script src='../fullcalendar/packages/interaction/main.js'></script>
<script src='../fullcalendar/packages/daygrid/main.js'></script>
<script src='../fullcalendar/packages/timegrid/main.js'></script>
<script src='../fullcalendar/moment.min.js'></script>
<!-- jQuery -->
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<!-- BS JavaScript -->
<script type="text/javascript" src="../js/bootstrap.js"></script>
<!-- Have fun using Bootstrap JS -->
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
  </head><br><br>
  @section('contenido')
  <body>
    <table class="table table-bordered">
      <thead>
        <tr>
        <th>Alumnos</th>
      <th>Dias Totales</th>
      <th>Dias asistidos</th>
      <th>Clases Faltadas</th>
      <th>Porcentaje asistencia</th>
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
            $asistencias = Asistencia::where('id_curso',1)->where('fecha_asistencia',$a->fecha_asistencia)->where('id_alumnos',$b->id_alumnos)->get(); 
            $count = Asistencia::where('id_curso',1)->where('fecha_asistencia',$a->fecha_asistencia)->where('id_alumnos',$b->id_alumnos)->count();
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
          <?php $clasesinasistencia = 0; ?>
      </tr>
        @endforeach
    </tbody>
  </table>
  </body>
</html>

@endsection