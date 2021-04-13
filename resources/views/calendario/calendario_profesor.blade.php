@extends('layouts.plantilla')
@section('contenido')
@include('calendario.modal_deleteevaluacion')
@include('calendario.modal_modificarcalendario')
<?php
      
      use App\Profesor;

      $profesor = Profesor::where('rut',auth()->user()->rut)->first();

    $cursos = DB::table('cuenta')
        ->join('dicta','cuenta.id_cuenta','dicta.id_cuenta')
        ->join('asignatura','cuenta.id_asignatura','=','asignatura.id_asignatura')
        ->join('curso','cuenta.id_curso','=','curso.id_curso')
        ->select('cuenta.id_cuenta','dicta.id_profesor','curso.id_curso','curso.grado','curso.letra','asignatura.nombre_asignatura')
        ->where('dicta.id_profesor','=',$profesor->id_profesor)
        ->where('dicta.año',date('Y'))
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
<script src='../fullcalendar/packages/core/locales/es.js'></script>
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
        let s = moment(info.event.start,calendar).format("DD-MM-YYYY");
        $("#prueba").val(info.event.id);
        $("#fechaver").text(m);
        $("#fechabien").text(s);
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
  <body>

    <div id='calendar'></div>

   <div class="modal fade bd-example-modal-lg" data-backdrop="static" id="modal_crearevaluacion" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Agendar Evaluacion
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
            <form action="/calendario/create" method="POST">
              @csrf
              <div class="modal-body">
                  <div class="box-body">
                    <input type="text" name="prueba" hidden>
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Fecha evaluacion
                              </label>
                              <input class="form-control" id="txtFecha" name="fecha" type="date" required>
                              </input>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Descripcion Evaluacion
                              </label>
                              <input class="form-control" name="descripcion_evaluacion" type="text" required>
                          </div>
                          <div class="form-group">
                            <label>
                              Cursos
                            </label>
                              <select name="cuenta" class="form-control">
                                <option hidden>Seleccione</option>
                                @foreach($cursos as $curso)
                                <option value="{{$curso->id_cuenta}}">{{$curso->nombre_asignatura.' '.$curso->grado.' '.$curso->letra}}</option>
                                @endforeach
                              </select>
                          </div>
                          
                      </input>
                  </div>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-default" data-dismiss="modal" type="button">
                      Cerrar
                  </button>
                  <button class="btn btn-social btn-warning"type="submit">
                      <i class="fa fa-new"></i>Crear
                  </button>
              </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="modal_vercalendario" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Ver Evaluacion
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
            
              @csrf
              <div class="modal-body">
                  <div class="box-body">
                    <input type="text" name="prueba" id="prueba" hidden>
                          <div class="form-group" hidden>
                              <label for="exampleInputEmail1">
                                  Fecha evaluacion
                              </label>
                              <span class="form-control" name="fechaver" id="fechaver"></span> 
                              </input>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Fecha evaluacion
                              </label>
                              <span class="form-control" name="fechabien" id="fechabien"></span> 
                              </input>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Descripcion Evaluacion
                              </label>
                              <span class="form-control" name="descripcion" id="descripcionver"></span>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Curso
                              </label>
                              <span class="form-control" name="descripcion" id="cursover"></span>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">
                                  Asignatura
                              </label>
                              <span class="form-control" name="descripcion" id="asignaturaver"></span>
                          </div>
                      </input>
                  </div>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-warning" onclick="modificar()" type="button">
                      Modificar
                  </button>
                  <button class="btn btn-social btn-danger" onclick="eliminar()" type="button">
                      <i class="fa fa-new"></i>Eliminar
                  </button>
              </div>
        </div>
    </div>
</div>
<script>
  
</script>
  </body>
</html>

@endsection