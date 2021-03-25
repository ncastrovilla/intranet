<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrativos extends Model
{
	protected $table = 'administrativos';

	protected $primaryKey = "id_administrativo";

	protected $filleable = ['nombre_administrativo','apellido_paterno','apellido_materno','rut','direccion_administrativo','correo_administrativo'];

	public $timestamps = false;

}
?>