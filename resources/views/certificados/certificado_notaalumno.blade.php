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
@foreach($curso as $c)
<h3>Notas {{$c->grado.' '.$c->letra}}
</h3>
@endforeach
<table>
    <tr>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        Rut
                                    </th>
                                    <th>
                                        1
                                    </th>
                                    <th>
                                        2
                                    </th>
                                    <th>
                                        3
                                    </th>
                                    <th>
                                        4
                                    </th>
                                    <th >
                                        5
                                    </th>
                                    <th >
                                        6
                                    </th>
                                    <th >
                                        7
                                    </th>
                                    <th>
                                        8
                                    </th>
                                    <th >
                                        9
                                    </th>
                                    <th>
                                        10
                                    </th>
                                    <th>
                                        Promedio
                                    </th>
                                </tr>
                                @foreach($alumno as $alumnos)
                                <tr>
                                    <td>
                                        {{$alumnos->apellido_paterno.' '.$alumnos->apellido_materno.' '.$alumnos->nombre_alumnos}}
                                    </td>
                                    <td>
                                        {{$alumnos->rut}}
                                    </td>
                                    <?php
                                       
                                        $nota = Notas::where('id_alumno','=',$alumnos->id_alumnos)->where('id_curso','=',$alumnos->id_curso)
                                                ->where('año',date('Y'))->where('semestre',1)->get();

                                        ?>
                                        @foreach($nota as $notas)

                                        @if(!is_null($nota))
                                      
                                                <td>{{$notas->nota}}</td>
                                        

                                        @else
                                        <td>{{$notas->id_notas}}</td>
                                        @endif
                                        



                                    @endforeach
                                        <?php
                                       
                                        $faltantes = Notas::where('id_alumno','=',$alumnos->id_alumnos)->where('id_curso','=',$alumnos->id_curso)
                                                ->where('año',date('Y'))->where('semestre',1)->count();

                                        ?>

                                        @for($i=1; $i<11-$faltantes; $i++)
                                            
                                            <td></td>
                                        @endfor
                                    <?php
                                        $ano = date('Y');
                                       
                                        $promedio = DB::table('notas')
                                                    ->where('id_alumno','=',$alumnos->id_alumnos)
                                                    ->where('año','=',$ano)->where('semestre',1)->avg('nota');

                                    ?>
                                    @if($promedio != NULL)
                                            <td>{{number_format(round($promedio, 1), 1, '.', '.')}}</td> 
                                    @else
                                        <td></td>
                                    @endif    
                                </tr>
                                @endforeach
</table>
<p></p>

</body>
</html>