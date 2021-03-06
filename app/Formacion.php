<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formacion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'formaciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'horas', 'trabajador', 'fecha'
    ];

    public function nombreTrabajador(){
        return $this->hasOne('App\Trabajador', 'id', 'trabajador');
    }
}
