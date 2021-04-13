<html>
<head>
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }
 
        body {
            margin: 2cm 3cm 3cm;
        }
        .center {
  margin-left: 200px;
}
 
    </style>
</head>
<body>
<header>
     <img class="center" src="http://localhost/intranet/public/images/descarga.png" />
    <p style="font-size:20px">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;<b><u>CERTIFICADO DE ALUMNO REGULAR</u></b></p>
</header>
@foreach($alumno as $a)
<p style="text-align: right;">Folio: 1{{date('Ymd').''.$a->id_alumnos}}</p>
<p><br></p>
<p style="text-align: justify;line-height: 2;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  JACQUELINE DEL CARMEN BUSTAMANTE VERGARA, <b>Directora del Colegio Enrique Molina Garmendia</b>, de la comuna de Hualpén, provincia de Concepción, Región del Bío-Bío. Certifica que el alumno/a <b>{{mb_strtoupper($a->nombre_alumnos).' '.mb_strtoupper($a->apellido_paterno).' '.mb_strtoupper($a->apellido_materno)}}</b> de R.U.T. <b>{{$a->rut}}</b> está matriculado/a cursando su <b>@foreach($curso as $c){{$c->grado}}@endforeach año</b> basico, del presente año <b>{{date('Y')}}</b>.</p>
@endforeach
<p><br></p>
<p style="text-align: justify;line-height: 2;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Se extiende el presente certificado a petición del interesado, para fines que estime conveniente.</p>
<p><br></p>


<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  ______________________________</p>
<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;JACQUELINE DEL CARMEN BUSTAMANTE VERGARA</p>
<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <b>DIRECTORA</b></p>
<?php setlocale(LC_ALL,'spanish'); $mes= strftime("%B");?>
<p><br></p>
<p><br></p>
<p>Hualpén, {{date('d').' de '.$mes.' del '.date('Y')}} </p>
<p><br></p>

</body>
</html>