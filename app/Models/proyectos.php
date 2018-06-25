<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class proyectos
 * @package App\Models
 * @version June 24, 2018, 2:59 pm UTC
 *
 * @property string nombre_proyecto
 * @property string descripcion
 */
class proyectos extends Model
{
    use SoftDeletes;

    public $table = 'proyectos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre_proyecto',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre_proyecto' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
