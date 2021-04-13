<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dicta extends Model
{

	protected $table = "dicta";

	protected $primaryKey = 'id_dicta';

	protected $filleable = ['id_profesor','id_cuenta','año'];

	public $timestamps = false;

}
?>