<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cursos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'horas', 'trabajador'
    ];

    public function nombreTrabajador(){
        return $this->hasOne('App\Trabajador', 'id', 'trabajador');
    }
}
