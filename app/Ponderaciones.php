<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ponderaciones extends Model
{
	protected $table = 'ponderaciones';

	protected $primaryKey = "id_ponderacion";

	protected $filleable = ['id_dicta','descripcion_ponderacion','cantidad','porcentaje'];

	public $timestamps = false;
}
?>