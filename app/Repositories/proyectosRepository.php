<?php

namespace App\Repositories;

use App\Models\proyectos;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class proyectosRepository
 * @package App\Repositories
 * @version June 24, 2018, 2:59 pm UTC
 *
 * @method proyectos findWithoutFail($id, $columns = ['*'])
 * @method proyectos find($id, $columns = ['*'])
 * @method proyectos first($columns = ['*'])
*/
class proyectosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre_proyecto',
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return proyectos::class;
    }
}
