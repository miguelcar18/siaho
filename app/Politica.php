<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Politica extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'politicas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'trabajador', 'fecha'
    ];

    public function nombreTrabajador(){
        return $this->hasOne('App\Trabajador', 'id', 'trabajador');
    }
}
