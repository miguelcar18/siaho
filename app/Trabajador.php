<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'trabajadores';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'cedula', 'cargo', 'departamento'
    ];

    /**
    * Obtener la cédula, el nombre y el apellido
    *
    * @return string
    */
    public function getCedulaNombreAttribute(){
        return number_format($this->cedula, 0, '', '.') . ' - ' . $this->nombre . ' ' . $this->apellido;
    }
}
