<?php

namespace App\Repositories;

use App\Models\conexiones;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class conexionesRepository
 * @package App\Repositories
 * @version June 23, 2018, 4:20 am UTC
 *
 * @method conexiones findWithoutFail($id, $columns = ['*'])
 * @method conexiones find($id, $columns = ['*'])
 * @method conexiones first($columns = ['*'])
*/
class conexionesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_from',
        'id_to'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return conexiones::class;
    }
}
