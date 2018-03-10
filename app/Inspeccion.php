<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inspeccion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'inspecciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fecha', 'tipo', 'realizado', 'sede'
    ];
}
