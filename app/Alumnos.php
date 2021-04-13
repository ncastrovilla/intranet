<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
	protected $table = 'alumnos';

	protected $primaryKey = "id_alumnos";

	protected $filleable = ['nombre_alumnos','apellido_paterno','apellido_materno','rut','direccion','correo_alumnos'];

	public function notas(){
		return $this->hasMany(Notas::class,'id_alumno');
	}
}
?>