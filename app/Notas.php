<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
	protected $table = "notas";

	protected $primaryKey = 'id';
	protected $filleable = ['nota','descripcion','semestre','año','id_alumno','id_asignatura','id_profesor','id_curso'];

	public function asociacions(){
		return $this->belongsToMany(Asociacions::class);
	}

} 

?>