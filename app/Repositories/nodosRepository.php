<?php

namespace App\Repositories;

use App\Models\nodos;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class nodosRepository
 * @package App\Repositories
 * @version June 23, 2018, 4:19 am UTC
 *
 * @method nodos findWithoutFail($id, $columns = ['*'])
 * @method nodos find($id, $columns = ['*'])
 * @method nodos first($columns = ['*'])
*/
class nodosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre_nodo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return nodos::class;
    }
}
