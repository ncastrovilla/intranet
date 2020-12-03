<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
	protected $primaryKey = "id";

	protected $filleable = ['nombre','codigo'];

	public function asociacions(){
		return $this->belongsToMany(Asociacions::class);
	}

}
?>