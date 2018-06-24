<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class nodos
 * @package App\Models
 * @version June 23, 2018, 4:19 am UTC
 *
 * @property string nombre_nodo
 */
class nodos extends Model
{
    use SoftDeletes;

    public $table = 'nodos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre_nodo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre_nodo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
