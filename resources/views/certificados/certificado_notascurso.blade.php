	<?php
	use App\Alumnos;
	use App\Notas;
	use App\Curso;
	use App\Asignatura;

	$cursos = Curso::where('id_curso',$curso)->first();
	$asignaturas =Asignatura::where('id_asignatura',$asignatura)->first();
?>

<html>
<head>

    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }
 
        body {
            margin: 0.5cm 1cm 1cm;
        }
 
    </style>
    <style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    th, td {
      padding: 2px;
      text-align: left;
    }
    </style>
</head>
<body>
<header>

</header>
<h3>Notas {{$asignaturas->nombre_asignatura.' '.$cursos->grado.' '.$cursos->letra}}
</h3>
<table>
    <tr>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        Rut
                                    </th>
                                    <?php $notas = DB::table('notas')
													   ->select('id_notas','descripcion','created_at','id_curso','id_asignatura','id_profesor')
									                   ->distinct()
													   ->where('id_curso','=',$curso)
													   ->where('id_asignatura','=',$asignatura)
													   ->get();
									if(date('m')<8) $semestre=1; else $semestre=2;
                 $faltantes = Notas::where('año',date('Y'))->where('semestre',$semestre)->where('id_asignatura',$asignatura)->where('id_curso',$curso)->groupBy('descripcion')->count();
                 					if ($faltantes==0) $faltantes=1;
                                    			   ?>
                                    @foreach($notas as $nota)
                                    <th>
                                    {{$nota->descripcion}}
                                    </th>
                                    @endforeach
                                    @for($i=++$faltantes;$i<11;$i++)
                                    <td>{{$i}}</td>
                                    @endfor
                                    <th>
                                        Promedio
                                    </th>
                                </tr>
                                <?php 	$alumnos = Alumnos::all()->where('id_curso',$curso);
                                ?>
                                @foreach($alumnos as $alumno)
                                <tr>
                                	<?php $notas = DB::table('notas')
													   ->select('nota')
									                   ->distinct()
													   ->where('id_curso','=',$curso)
													   ->where('id_asignatura','=',$asignatura)
													   ->where('id_alumno','=',$alumno->id_alumnos)
													   ->get();
											$promedio=0;
											$cantidad=0;		    
                                    			   ?>
                                	<td>{{$alumno->nombre_alumnos}}</td>
                                	<td>{{$alumno->rut}}</td>
                                	@foreach($notas as $nota)
                                	<?php $promedio+=$nota->nota;
                                		  ++$cantidad; ?>
                                	<td>{{$nota->nota}}</td>
                                	@endforeach
                                	@for($i=$faltantes;$i<11;$i++)
                                    <td></td>
                                    @endfor
                                	@if($cantidad!=0)
                                	<td>{{$promedio/$cantidad}}</td>
                                	@else
                                	<td></td>
                                	@endif
                                </tr>
                                @endforeach
                                
</table>
<p></p>

</body>
</html>