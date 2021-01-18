@extends('layouts.plantilla')
@section('title', 'ver notas profesor')
@section('contenido')

<?php $curso = DB::table('asistencia')
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

?>
<h1>Prueba de grafico de asistencia de alumnos {{$esperada}}</h1>
	<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css">
	<canvas id="mychart" width="auto" height="150"></canvas><br>
    <div class="bs-callout bs-callout-warning">    
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Asistencia</th>
            </tr>
        </thead>
        <tbody>
            @foreach($curso as $c)
            <tr>
                <td>{{$c->fecha_asistencia}}</td>
                @if($c->presente_asistencia=='Si')
                <td><span class="fa fa-check fa-2x" style="color:green"></span></td>
                @else
                <td><span class="fa fa-remove fa-2x" style="color:red"></span></td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
</script>
</body>
</html>
@endsection