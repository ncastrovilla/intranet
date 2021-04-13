<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
	protected $table = 'noticias';

	protected $primaryKey = "id_noticia";

	protected $filleable = ['titulo_noticia','descripcion_noticia','cuerpo_noticia','fecha_noticia','imagen'];

	public $timestamps = false;

}
?>