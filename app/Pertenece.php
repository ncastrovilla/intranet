<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertenece extends Model
{
	protected $table = 'pertenece';

	protected $primaryKey = "id_curso";

	protected $filleable = ['id_alumno','año'];

	public $timestamps = false;

}
?>