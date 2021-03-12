@extends('layouts.plantilla')
@section('title', 'ver notas profesor')
@section('contenido')

<?php 

use App\Documentos;
$ruta = auth()->user()->name;
$ruta = str_replace(' ', '', $ruta);

$doc = Documentos::all();

$curso = DB::table('asistencia')
                            ->select('fecha_asistencia','presente_asistencia')
                            ->where('id_alumnos','=',6)
                            ->where('id_asignatura','=',3)
                            ->get();

    $esperada = 0;
    $obtenida = 0;
foreach ($curso as $c) {
    $esperada++;
    if ($c->presente_asistencia=='Si') {
        ++$obtenida;
    }
}

        $asistencias = DB::table('asistencia')
                   ->select('id_asistencia','fecha_asistencia','id_curso','presente_asistencia')
                   ->distinct()
                   ->where('id_curso','=',1)
                   ->where('id_asignatura','=',2)
                   ->where('id_profesor','=',2)
                   ->wheremonth('fecha_asistencia',"=",1)
                   ->orderBy('fecha_asistencia')
                   ->get();

        $nombre_curso = DB::table('curso')
                        ->where('id_curso','=',3)
                        ->get();

?>
<h1>Prueba de grafico de asistencia de alumnos {{$esperada}}</h1>
<script src="http://code.jquery.com/jquery-latest.js"></script>
 
<input type="text" id="id">
<input type="text" name="nombre">
<select class="selectpicker">
    <option id="1">opcion 1</option>
    <option id="2">opcion 2</option>
</select>
 
<script>
$(".selectpicker").on("change", function(){
    $('#id').val($(".selectpicker option:selected").text());
    $('#nombre').val(hola);
});
</script>
	<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
	<canvas id="mychart" width="auto" height="150"></canvas><br>
    <input type="date" name="">
    <div class="bs-callout bs-callout-warning">
    <table id="example" class="table table-hover table-bordered" style="width: auto; height: auto;">
        <thead>
            <tr>
               @for($i=1;$i<30;$i++)
                <th style="padding: 5px; font-size: 10px;">{{date('d-m-y')}}</th>
                @endfor
            </tr>
        </thead>
        <tbody>
            @foreach($asistencias as $a)
            <tr><?php

                $fecha = date('m',strtotime($c->fecha_asistencia));
             ?>
                <td style="padding: 2px; font-size: 10px;">{{date("d-m-Y", strtotime($c->fecha_asistencia))}}</td>
                @if($a->presente_asistencia=='Si')
                <td style="padding: 2px; font-size: 10px;"><span class="fa fa-check fa-2x" style="color:green"></span></td>
                @else
                <td style="padding: 2px; font-size: 10px;"><span class="fa fa-remove fa-2x" style="color:red"></span></td>
                @endif
                <td style="padding: 2px; font-size: 10px;"><a type="button" class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#modal_verasistencia-{{$a->id_asistencia}}"><i class="fas fa-eye" style="color: white;"></i></a>
                    @include('asistencia.modal_verasistencia')
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    @foreach($doc as $d)
    <a href="/file/download/{{$d->file}}">{{$d->file}}</a><br>
    @endforeach
    <form action="file/upload" method="post" enctype="multipart/form-data" name="formName" >
        @csrf
        <input type="file" name="file">
        <button type="submit" value="subir">Guardar</button>
    </form>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
        var asistencia = <?php echo $esperada ?>;
        var obtenida = <?php echo $obtenida ?>;
var ctx = document.getElementById('mychart').getContext('2d');
var mychart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Asistencia esperada', 'Assitencia Obtenida'],
        datasets: [{
            data: [asistencia,obtenida],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
        }]
    }
});
$(document).ready( function () {
    $('#example').DataTable();
} );
</script>
</body>
</html>
@endsection