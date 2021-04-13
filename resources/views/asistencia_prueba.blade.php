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
    $n = DB::table('asistencia')
                ->select('fecha_asistencia')
                ->where('id_curso',1)
                ->whereYear('fecha_asistencia',date('Y'))
                ->whereMonth('fecha_asistencia','<=',date('m'))
                ->groupBy('fecha_asistencia')
                ->count('fecha_asistencia');
    $alumnos = DB::table('alumnos')
              ->join('pertenece','alumnos.id_alumnos','pertenece.id_alumno')
              ->where('pertenece.id_curso',1)
              ->where('pertenece.año',date('Y'))
              ->get();

              $n=0;
    
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
    <script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      locale: 'esLocale',
      plugins: [  'interaction', 'dayGrid', 'timeGrid' ],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
      select: function(arg) {
        let m = moment(arg.start,calendar).format("YYYY-MM-DD");
        $("#txtFecha").val(m);
        console.log(arg);
        $("#modal_crearevaluacion").modal();
        calendar.unselect()
      },
      eventClick: function(info){
        console.log(info.event.id);
        let m = moment(info.event.start,calendar).format("YYYY-MM-DD");
        $("#prueba").val(info.event.id);
        $("#fechaver").text(m);
        $("#descripcionver").text(info.event.title);
        $("#cursover").text(info.event.extendedProps.curso);
        $("#asignaturaver").text(info.event.extendedProps.asignatura);
        $("#modal_vercalendario").modal();
      },
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: 'calendario/listar'
    });
    calendar.setOption('locale', 'es');
    calendar.render();
  });

  function modificar(){
    $("#modal_vercalendario").modal('toggle');
    $("#modal_modificarcalendario").modal();
    let i = document.getElementById('prueba').value;
    $("#idupdate").val(i);
    let f = document.getElementById('fechaver').innerHTML;
    let d = document.getElementById('descripcionver').innerHTML;
    console.log(f);
    $("#fechaupdate").val(f);
    $("#descripcionupdate").val(d);
    let c = document.getElementById('cursover').innerHTML;
    let a = document.getElementById('asignaturaver').innerHTML;
    $("#cursoant").text(a + " " + c );
  }
  function eliminar(){
    let f = document.getElementById('prueba').value;
    $("#modal_vercalendario").modal('toggle');
    $("#modal_deleteevaluacion").modal();
    $("#ideliminar").val(f);
  }

</script>
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
  </head>
  @section('contenido')
  <br><br>
  <body>
    <table class="table table-bordered">
      <thead>
        <tr>
        <th>Alumnos</th>
    @foreach($asistencia as $a)
        <th>{{$a->fecha_asistencia}}</th>
        <?php 
          $n++;
        ?>
      @endforeach
      <th>Horas asistencias</th>
      <th>Horas Inasistencias</th>
      <th>Dias asistencias</th>
      <th>Dias Inasistencias</th>
    </tr>
      </thead>
      <tbody>
        @foreach($alumnos as $b)
        <?php 
              $asistenciass=0;
              $inasistenciass=0;
              $dasistenciass=0;
              $dinasistenciass=0;
        ?>
        <tr>
          <td>{{$b->nombre_alumnos}}</td>
          @foreach($asistencia as $a)
          <?php 
            $asistencias = Asistencia::where('id_curso',1)->where('fecha_asistencia',$a->fecha_asistencia)->where('id_alumnos',$b->id_alumnos)->get(); 
            $count = Asistencia::where('id_curso',1)->where('fecha_asistencia',$a->fecha_asistencia)->where('id_alumnos',$b->id_alumnos)->count();
            echo $count;
          ?>
          @foreach($asistencias as $c)
          <?php 

            if ($c->presente_asistencia=="Si") {
              $asistenciass++;
            }else{
              $inasistenciass++;
            }

          ?>
          <td>{{$c->presente_asistencia}}</td>
          @endforeach
          @endforeach
          <td>{{$asistenciass}}</td>
          <td>{{$inasistenciass}}</td>
        </tr>
        @endforeach
      </tbody>
</table>
   {{$n}}
<script>
  
</script>
  </body>
</html>

@endsection