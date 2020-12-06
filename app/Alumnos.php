<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
	protected $primaryKey = "id";

	protected $filleable = ['nombre','apellido_paterno','apellido_materno','rut','direccion','correo','id_curso'];

}
?>