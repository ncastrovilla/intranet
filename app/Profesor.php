<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{

	protected $table = "profesor";

	protected $primaryKey = "id";

	protected $filleable = ['nombres','apellido_paterno','apellido_materno','rut','correo'];

}
?>