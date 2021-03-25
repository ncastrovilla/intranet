<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administradores extends Model
{
	protected $table = 'administradores';

	protected $primaryKey = "id_administrador";

	protected $filleable = ['nombre_administrador','apellido_paterno','apellido_materno','rut','direccion_administrador','correo_administrador'];

	public $timestamps = false;

}
?>