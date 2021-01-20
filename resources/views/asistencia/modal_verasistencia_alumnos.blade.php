<div class="modal fade bd-example-modal-lg" id="modal_verasistencia_alumnos-{{$a->id_alumnos}}-{{$a->id_asignatura}}" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <?php 
$curso = DB::table('asistencia')
                            ->select('fecha_asistencia','presente_asistencia')
                            ->where('id_alumnos','=',$a->id_alumnos)
                            ->where('id_asignatura','=',$a->id_asignatura)
                            ->orderBy('fecha_asistencia')
                            ->get();

    $esperada = 0;
    $obtenida = 0;
foreach ($curso as $c) {
    $esperada++;
    if ($c->presente_asistencia=='Si') {
        ++$obtenida;
    }
}
$porcentaje= 0 ;
if ($esperada!=0) {
  $porcentaje = $obtenida/$esperada*100;
}

?>
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Asistencia
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                  <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
            
              <div class="modal-body">
                @if($esperada!=0)
                <div class="bs-callout bs-callout-success">
                <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css">
  <canvas id="mychart{{$a->id_asignatura}}" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 800px;"></canvas>
</div>
    <div class="bs-callout bs-callout-info">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Porcentaje Asistencia</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{number_format($porcentaje,'1','.',',')}}%</td>
                </tr>
            </tbody>
        </table>
    </div>
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
                <td>{{date("d-m-Y", strtotime($c->fecha_asistencia))}}</td>
                @if($c->presente_asistencia=='Si')
                <td><span class="fa fa-check fa-2x" style="color:green"></span></td>
                @else
                <td><span class="fa fa-times fa-2x" style="color:red"></span></td>
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
var ctx = document.getElementById('mychart{{$a->id_asignatura}}').getContext('2d');
var mychart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Asistencia esperada', 'Asistencia Obtenida'],
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
    },
    options: {
      responsive: true
    }
});
</script>
@else
<div class="bs-callout bs-callout-info">  
<h3>Actualmente no existen registros de asistencias en esta asignatura</h3>
</div>
 @endif
              </div>
              <div class="modal-footer">
                  <button class="btn btn-default" data-dismiss="modal" type="button">
                      Cerrar
                  </button>
              </div>
        </div>
    </div>
</div>