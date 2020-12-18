<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{

	protected $table = "profesor";

	protected $primaryKey = "id_profesor";

	protected $filleable = ['nombres_profesor','apellido_paterno','apellido_materno','rut','correo'];

}
?>