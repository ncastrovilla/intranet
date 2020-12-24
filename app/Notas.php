<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
	protected $table = "notas";

	protected $primaryKey = ['id_notas','id_alumno'];
	protected $filleable = ['nota','descripcion','semestre','año','id_asignatura','id_profesor','id_curso'];

	public function alumno(){
		return $this->belongsTo(Alumnos::class,'id_alumno');
	}

	public $incrementing = false;
} 

?>