<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prueba extends Model
{

	protected $table = "pruebas";

	protected $primaryKey = "id";

	protected $filleable = ['nombre','rut','direccion'];

}
?>