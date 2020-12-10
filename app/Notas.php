<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
	protected $table = "notas";

	protected $primaryKey = 'id_notas';
	protected $filleable = ['nota','descripcion','semestre','año','id_alumno','id_asignatura','id_profesor','id_curso'];

	public function alumno(){
		return $this->belongsTo(Alumnos::class,'id_alumno');
	}

} 

?>