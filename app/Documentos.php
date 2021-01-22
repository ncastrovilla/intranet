<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    protected $table = 'documentos';

    protected $fillable = ['titulo_documento','descripcion_documento','tipo_documento','file','id_curso','id_profesor','id_asignatura','nombre','año','semestre'];
}
