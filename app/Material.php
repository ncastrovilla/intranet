<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
	protected $table = 'material';

	protected $primaryKey = "id_material";

	protected $filleable = ['titulo','tipo','documento','id_curso','id_asignatura','año','semestre'];


	public $timestamps = false;
}
?>