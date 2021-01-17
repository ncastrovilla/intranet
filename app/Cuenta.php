<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
	protected $table = 'cuenta';

	protected $filleable = ['id_curso','id_asignatura','id_profesor'];

	public $timestamps = false;

}
?>