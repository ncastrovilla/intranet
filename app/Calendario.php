<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
	protected $table = 'calendario';

	protected $primaryKey = "id_calendario";

	protected $filleable = ['fecha_evaluacion','descripcion_evaluacion','id_curso','id_asignatura','id_profesor'];

	public $timestamps = false;
}
?>