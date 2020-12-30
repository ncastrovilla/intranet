<?php 
use App\Notas;
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
    <p style="font-size:15px;line-height: 1;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <b><u>@if($semestre==1) PRIMER @else SEGUNDO @endif SEMESTRE 2020</u></b></p>
</header>
<p style="text-align: right;">Folio: 2{{date('Ymd')}}</p>
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
             ?>
            <td style="width: 75%;">{{$profesor->nombres_profesor.' '.$profesor->apellido_paterno.' '.$profesor->apellido_materno}}</td>
        </tr>
    </tbody>
</table>
<p></p>
<table style="width: 100%;">
    <tbody>
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
        </tr>
            <?php $promedioparcial=0; $cantidad=0;?>
            @foreach($asignatura as $asignaturas)
            <?php $nombre = DB::table('asignatura') 
                            ->where('id_asignatura','=',$asignaturas->id_asignatura)
                            ->get();
            ?>
            <tr>
                @foreach($nombre as $n)
                <td>{{$n->nombre_asignatura}}</td>
                <?php $notas = DB::table('notas') 
                            ->where('id_asignatura','=',$asignaturas->id_asignatura)
                            ->where('id_alumno','=',$alumno->id_alumnos)
                            ->where('semestre','=',$semestre)
                            ->get();?>
                
                @foreach($notas as $nota)
                @if($notas!=[])
                <td>{{$nota->nota}}</td>
                @endif
                @endforeach
                 <?php
                 $faltantes = Notas::where('id_alumno','=',$alumno->id_alumnos)->where('año',date('Y'))->where('semestre',$semestre)->where('id_asignatura',$asignaturas->id_asignatura)->count();
                                        ?>

                                        @for($i=1; $i<11-$faltantes; $i++)
                                            
                                            <td></td>
                                        @endfor
                @if($faltantes==0)
                <td></td>
                @else
                <?php 
                    $faltantes = Notas::where('id_alumno','=',$alumno->id_alumnos)->where('año',date('Y'))->where('semestre',$semestre)->where('id_asignatura',$asignaturas->id_asignatura)->avg('nota');
                    $promedioparcial += $faltantes;
                    ++$cantidad;
                ?>
                <td>{{$faltantes}}</td>
                @endif
                @endforeach
            </tr>
            @endforeach
        
    </tbody>
</table>
<p></p>
<table style="width: 39%;">
    <tbody>
        <tr>
            <th style="width: 60%;">Promedio general</th>
            @if($promedioparcial==0)
            <td style="width: 40%;"></td>
            @else
            <td style="width: 40%;">{{$promedioparcial/$cantidad}}</td>
            @endif
        </tr>
    </tbody>
</table>
<p></p><br>
<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ______________________________</p>
<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;JACQUELINE DEL CARMEN BUSTAMANTE VERGARA</p>
<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <b>DIRECTORA</b></p>
<?php setlocale(LC_ALL,'spanish'); $mes= strftime("%B");?>

<p>Hualpen, {{date('d').' de '.$mes.' del '.date('Y')}} </p>
<p style="font-size:12px">La autenticidad de este certificado puede verificarse en nuestro sitio web, <b>www.institutosanpedro.cl</b>, sección de Servicios Virtuales, ingresando el <b>número de folio</b> que registra este documento.</p>
</body>
</html>