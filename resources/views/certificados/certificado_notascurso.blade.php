<?php 
use App\Notas;
use App\Asignatura;
use App\Ponderaciones;
use App\Cuenta;
use App\Dicta;
use App\Curso;

$nombreasig = Asignatura::where('id_asignatura',$asignatura)->first();
$curso = Curso::where('id_curso',$curso)->first();
$promediogeneral = 0;

$alumnos = DB::table('alumnos')
          ->join('pertenece','alumnos.id_alumnos','pertenece.id_alumno')
          ->where('pertenece.id_curso',$curso->id_curso)
          ->where('pertenece.año',$año)
          ->get();
          $nalumnos = DB::table('alumnos')
          ->join('pertenece','alumnos.id_alumnos','pertenece.id_alumno')
          ->where('pertenece.id_curso',$curso->id_curso)
          ->where('pertenece.año',$año)
          ->count();

$cuenta = Cuenta::where('id_curso',$curso->id_curso)->where('id_asignatura',$asignatura)->first();

$dicta = Dicta::where('id_cuenta',$cuenta->id_cuenta)->where('año',$año)->first();

$cantidadpon = Ponderaciones::where('id_dicta',$dicta->id_dicta)->where('semestre',$semestre)->sum('cantidad');

$aux = 0;

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
    <p style="font-size:20px;line-height: 1;"><img src="http://localhost/intranet/public/images/descarga.png" style="width: 80px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b><u>CERTIFICADO DE NOTAS</u></b></p>
    <p style="font-size:15px;line-height: 1;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <b><u>@if($semestre==1) PRIMER @else SEGUNDO @endif SEMESTRE {{$año}}</u></b></p>
</header>
<br>
<table style="width: 39%;">
    <tbody>
        <tr>
            <th style="width: 41.4692%;">Curso</th>
            <td style="width: 58.2323%;">{{$curso->grado.' Basico '.$curso->letra}}</td>
        </tr>
    </tbody>
</table>
<p></p>
<table style="width: 100%;">
    <tbody>
        
        <tr>
            <th style="width: 35%;">Asignatura</th>
            <td style="width: 75%;">{{$nombreasig->nombre_asignatura}}</td>
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
            <th style="width: 25%;">Alumnos</th>
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
            <?php $promedioparcial=0; $cantidad=0;?>
            @foreach($alumnos as $alumno)
            <?php 
                $notas = DB::table('notas') 
                            ->join('ponderaciones','notas.id_ponderacion','ponderaciones.id_ponderacion')
                            ->where('notas.id_asignatura','=',$asignatura)
                            ->where('notas.id_alumno','=',$alumno->id_alumnos)
                            ->where('notas.semestre','=',$semestre)
                            ->where('notas.año','=',$año)
                            ->get();
                            $n = DB::table('notas') 
                            ->join('ponderaciones','notas.id_ponderacion','ponderaciones.id_ponderacion')
                            ->where('notas.id_asignatura','=',$asignatura)
                            ->where('notas.id_alumno','=',$alumno->id_alumnos)
                            ->where('notas.semestre','=',$semestre)
                            ->where('notas.año','=',$año)
                            ->count();
            $suma = 0;
            ?>
            <tr>
                <td>{{$alumno->nombre_alumnos}}</td>
                <?php
                            ?>
                @foreach($notas as $nota)
                <?php
                $notanormal = $nota->nota;
                    $porcentajeindividual = $nota->porcentaje/$nota->cantidad;
                      $nota = ($nota->nota * $porcentajeindividual)/100;
                      $nota = number_format($nota,'1','.',','); 
                      $suma += $nota;
                      
                      ++$notas;
                  ?> 
                @if(!$notas->isEmpty())
                <td>{{$notanormal}}</td>
                @endif
                @endforeach
                 <?php
                 $faltantes = Notas::where('id_alumno','=',$alumno->id_alumnos)->where('año',$año)->where('semestre',$semestre)->where('id_asignatura',$asignatura)->count();
                                        ?>

                                        @for($i=$faltantes; $i<10; $i++)
                                            <td></td>
                                        @endfor
                @if($faltantes==0)
                <td></td>
                @else
                <?php 
                    ++$cantidad;
                ?>
                @if($cantidadpon <= $n)
                <td>{{number_format($suma,'1','.',',')}}</td>
                @else
                <td></td>
                @endif
                @endif
            </tr>
            <?php $promediogeneral += $suma; ?>
            @endforeach
        
    </tbody>
</table>
<p></p>
<table style="width: 39%;">
    <tbody>
        <tr>
            <th style="width: 60%;">Promedio general</th>
            @if($cantidadpon > $n)
            <td style="width: 40%;"></td>
            @else
            <td style="width: 40%;">{{number_format($promediogeneral/$nalumnos,'1','.',',')}}</td>
            @endif
        </tr>
    </tbody>
</table>
<p></p><br>
</html>