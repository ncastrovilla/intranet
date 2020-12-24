<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anotaciones extends Model
{

	protected $table = "anotaciones";

	protected $primaryKey = "id_anotaciones";

	protected $filleable = ['id_alumno','id_asignatura','anotacion','fecha_anotacion','hora_anotacion','id_curso','id_profesor'];

	public $timestamps = false;

}
?>