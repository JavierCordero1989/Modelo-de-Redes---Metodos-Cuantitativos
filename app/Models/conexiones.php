<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class conexiones
 * @package App\Models
 * @version June 23, 2018, 4:20 am UTC
 *
 * @property integer id_from
 * @property integer id_to
 */
class conexiones extends Model
{
    use SoftDeletes;

    public $table = 'conexiones';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_from',
        'id_to'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_from' => 'integer',
        'id_to' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
