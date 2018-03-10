<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delegado extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'delegados';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'trabajador', 'fecha', 'tipo'
    ];

    public function nombreTrabajador(){
        return $this->hasOne('App\Trabajador', 'id', 'trabajador');
    }
}
