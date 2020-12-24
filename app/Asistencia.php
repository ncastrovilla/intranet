<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
	protected $table = 'asistencia';

	protected $primaryKey = ['id_asistencia','id_alumnos'];

	protected $filleable = ['fecha_asistencia','presente_asistencia','id_curso','id_asignatura','id_profesor'];

	public $incrementing = false;
}
?>