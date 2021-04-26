<?php 
use App\Notas;
use App\Cuenta;
use App\Dicta;
use App\Ponderaciones;
$promediogeneral = 0;
?>
<html>
<head>

    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }
 
        body {
            margin: 0.5cm 3cm 3cm;
        }
 
    </style>
    <style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    th, td {
      padding: 5px;
      text-align: left;
    }
    </style>
</head>
<body>
<header>
    <p style="font-size:20px;line-height: 1;"><img src="http://localhost/intranet/public/images/descarga.png" style="width: 80px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;<b><u>CERTIFICADO DE NOTAS</u></b></p>
   
</header>
<table style="width: 100%;">
    <tbody>
        <tr>
            <th >Curso</th>
            <td>{{$curso->grado.' Basico '.$curso->letra}}</td>
        </tr>
        <tr>
            <th style="width: 35%;">Nombre</th>
            <td style="width: 75%;">{{$alumno->nombre_alumnos.' '.$alumno->apellido_paterno.' '.$alumno->apellido_materno}}</td>
        </tr>
        <tr>
            <th style="width: 35%;">Rut</th>
            <td style="width: 75%;">{{$alumno->rut}}</td>
        </tr>
        <tr>
            <th style="width: 35%;">Profesor jefe</th>
            <?php $profesor = DB::table('curso')
                              ->join('profesor','curso.id_profesor','=','profesor.id_profesor')
                              ->select('nombres_profesor','apellido_paterno','apellido_materno')
                              ->where('id_curso','=',$curso->id_curso)
                              ->first();
                              $suma=0;
             ?>
            <td style="width: 75%;">{{$profesor->nombres_profesor.' '.$profesor->apellido_paterno.' '.$profesor->apellido_materno}}</td>
        </tr>
    </tbody>
</table>

<p></p>
<table style="width: 100%;">
    <tbody>
        <tr>
            <th></th>
            <th colspan="11">Primer Semestre</th>
            <th colspan="11">Segundo Semestre</th>
        </tr>
        <tr>
            <th style="width: 25%;">Asignatura</th>
            <th style="width: 6%;">N1</th>
            <th style="width: 6%;">N2</th>
            <th style="width: 6%;">N3</th>
            <th style="width: 6%;">N4</th>
            <th style="width: 6%;">N5</th>
            <th style="width: 6%;">N6</th>
            <th style="width: 6%;">N7</th>
            <th style="width: 6%;">N8</th>
            <th style="width: 6%;">N9</th>
            <th style="width: 6%;">N10</th>
            <th style="width: 15%;">Promedio parcial</th>
            <th style="width: 6%;">N1</th>
            <th style="width: 6%;">N2</th>
            <th style="width: 6%;">N3</th>
            <th style="width: 6%;">N4</th>
            <th style="width: 6%;">N5</th>
            <th style="width: 6%;">N6</th>
            <th style="width: 6%;">N7</th>
            <th style="width: 6%;">N8</th>
            <th style="width: 6%;">N9</th>
            <th style="width: 6%;">N10</th>
            <th style="width: 15%;">Promedio parcial</th>
        </tr>
            <?php $promedioparcial=0; $cantidad=0; $psemestral1=0; $psemestral2=0; $n1=0; $n2=0;?>
            @foreach($asignatura as $asignaturas)
            <?php $nombre = DB::table('asignatura') 
                            ->where('id_asignatura','=',$asignaturas->id_asignatura)
                            ->get();
            $suma = 0;
            ?>
            <tr>
                @foreach($nombre as $n)
                <td>{{$n->nombre_asignatura}}</td>
                <?php $notas = DB::table('notas') 
                            ->join('ponderaciones','notas.id_ponderacion','ponderaciones.id_ponderacion')
                            ->where('notas.id_asignatura','=',$asignaturas->id_asignatura)
                            ->where('notas.id_alumno','=',$alumno->id_alumnos)
                            ->where('notas.semestre','=',1)
                            ->where('notas.año','=',$año)
                            ->get();
                    $cuenta = Cuenta::where('id_curso',$curso->id_curso)->where('id_asignatura',$asignaturas->id_asignatura)->first();
                    $dicta = Dicta::where('id_cuenta',$cuenta->id_cuenta)->where('año',$año)->first();
                    $cantidadpon = Ponderaciones::where('id_dicta',$dicta->id_dicta)->sum('cantidad');
                            ?>
                @foreach($notas as $nota)
                <?php
                $notanormal = $nota->nota;
                    $porcentajeindividual = $nota->porcentaje/$nota->cantidad;
                      $nota = ($nota->nota * $porcentajeindividual)/100;
                      $nota = number_format($nota,'2','.',','); 
                      $suma += $nota;
                      $promediogeneral = $suma;
                  ?> 
                @if($notas!=[])
                <td>{{$notanormal}}</td>
                @endif
                @endforeach
                 <?php
                 $faltantes = Notas::where('id_alumno','=',$alumno->id_alumnos)->where('año',$año)->where('semestre',1)->where('id_asignatura',$asignaturas->id_asignatura)->count();
                                        ?>

                                        @for($i=$faltantes; $i<10; $i++)
                                            <td></td>
                                        @endfor
                @if($faltantes != $cantidadpon || $faltantes == 0)
                <?php $n1++; ?>
                <td></td>
                @else
                <?php 
                    $faltantes = Notas::where('id_alumno','=',$alumno->id_alumnos)->where('año',$año)->where('semestre',1)->where('id_asignatura',$asignaturas->id_asignatura)->avg('nota');
                    $promedioparcial += $faltantes;
                    ++$cantidad;
                    $psemestral1 += $suma;
                ?>
                <td>{{number_format($suma,'1','.',',')}}</td>
                @endif
                @endforeach
                <!-- Segundo Semestre -->
                 @foreach($nombre as $n)
                <?php $notas = DB::table('notas') 
                            ->join('ponderaciones','notas.id_ponderacion','ponderaciones.id_ponderacion')
                            ->where('notas.id_asignatura','=',$asignaturas->id_asignatura)
                            ->where('notas.id_alumno','=',$alumno->id_alumnos)
                            ->where('notas.semestre','=',2)
                            ->where('notas.año','=',$año)
                            ->get();
                            $cuenta = Cuenta::where('id_curso',$curso->id_curso)->where('id_asignatura',$asignaturas->id_asignatura)->first();
                    $dicta = Dicta::where('id_cuenta',$cuenta->id_cuenta)->where('año',$año)->first();
                    $cantidadpon = Ponderaciones::where('id_dicta',$dicta->id_dicta)->sum('cantidad');
                            ?>
                @foreach($notas as $nota)
                <?php
                $notanormal = $nota->nota;
                    $porcentajeindividual = $nota->porcentaje/$nota->cantidad;
                      $nota = ($nota->nota * $porcentajeindividual)/100;
                      $nota = number_format($nota,'2','.',','); 
                      $suma += $nota;
                      $promediogeneral = $suma;
                      ++$notas;
                  ?> 
                @if($notas!=[])
                <td>{{$notanormal}}</td>
                @endif
                @endforeach
                 <?php
                 $faltantes = Notas::where('id_alumno','=',$alumno->id_alumnos)->where('año',$año)->where('semestre',2)->where('id_asignatura',$asignaturas->id_asignatura)->count();
                                        ?>

                                        @for($i=$faltantes; $i<10; $i++)
                                            <td></td>
                                        @endfor
                @if($faltantes != $cantidadpon || $faltantes == 0)
                <?php $n2++; ?>
                <td></td>
                @else
                <?php 
                    $faltantes = Notas::where('id_alumno','=',$alumno->id_alumnos)->where('año',$año)->where('semestre',2)->where('id_asignatura',$asignaturas->id_asignatura)->avg('nota');
                    $promedioparcial += $faltantes;
                    ++$cantidad;
                    $psemestral2+=$suma;
                ?>
                <td>{{number_format($psemestral2,'1','.',',')}}</td>
                @endif
                <!-- Segundo Semestre -->
                @endforeach
            </tr>
            @endforeach
                <?php $psemestral1 = $psemestral1/$nasign; $psemestral2 = $psemestral2/$nasign; ?>
            <tr>
                <td colspan="11">Promedio Semestral</td>
                @if($n1==0)
                <td>{{$psemestral1}}</td>
                @else
                <td></td>
                @endif
                <td colspan="10">Promedio Semestral</td>
                @if($n2==0)
                <td>{{$psemestral2}}</td>
                @else
                <td></td>
                @endif
            </tr>
        
    </tbody>
</table>
<p></p>
<table style="width: 39%;">
    <tbody>
        <tr>
            <th style="width: 60%;">Promedio general</th>
            @if($psemestral1 == 0 || $psemestral2 == 0)
            <td style="width: 40%;"></td>
            @else
            <td style="width: 40%;">{{number_format(($psemestral1+$psemestral2)/2,'1','.',',')}}</td>
            @endif
        </tr>
        <tr>
            <th style="width: 60%;">Firma Primer semestre</th>
        </tr>
    </tbody>
</table>
<p></p><br>
<p> ______________________________</p>
<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;JACQUELINE DEL CARMEN BUSTAMANTE VERGARA</p>
<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <b>DIRECTORA</b></p>
<?php setlocale(LC_ALL,'spanish'); $mes= strftime("%B");?>

<p>Hualpen, {{date('d').' de '.$mes.' del '.date('Y')}} </p>

</html>