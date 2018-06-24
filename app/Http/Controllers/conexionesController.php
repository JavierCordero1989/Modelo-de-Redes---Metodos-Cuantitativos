<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateconexionesRequest;
use App\Http\Requests\UpdateconexionesRequest;
use App\Repositories\conexionesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class conexionesController extends AppBaseController
{
    /** @var  conexionesRepository */
    private $conexionesRepository;

    public function __construct(conexionesRepository $conexionesRepo)
    {
        $this->conexionesRepository = $conexionesRepo;
    }

    /**
     * Display a listing of the conexiones.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->conexionesRepository->pushCriteria(new RequestCriteria($request));
        $conexiones = $this->conexionesRepository->all();

        return view('conexiones.index')
            ->with('conexiones', $conexiones);
    }

    /**
     * Show the form for creating a new conexiones.
     *
     * @return Response
     */
    public function create()
    {
        return view('conexiones.create');
    }

    /**
     * Store a newly created conexiones in storage.
     *
     * @param CreateconexionesRequest $request
     *
     * @return Response
     */
    public function store(CreateconexionesRequest $request)
    {
        $input = $request->all();

        $conexiones = $this->conexionesRepository->create($input);

        Flash::success('Conexiones saved successfully.');

        return redirect(route('conexiones.index'));
    }

    /**
     * Display the specified conexiones.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $conexiones = $this->conexionesRepository->findWithoutFail($id);

        if (empty($conexiones)) {
            Flash::error('Conexiones not found');

            return redirect(route('conexiones.index'));
        }

        return view('conexiones.show')->with('conexiones', $conexiones);
    }

    /**
     * Show the form for editing the specified conexiones.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $conexiones = $this->conexionesRepository->findWithoutFail($id);

        if (empty($conexiones)) {
            Flash::error('Conexiones not found');

            return redirect(route('conexiones.index'));
        }

        return view('conexiones.edit')->with('conexiones', $conexiones);
    }

    /**
     * Update the specified conexiones in storage.
     *
     * @param  int              $id
     * @param UpdateconexionesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateconexionesRequest $request)
    {
        $conexiones = $this->conexionesRepository->findWithoutFail($id);

        if (empty($conexiones)) {
            Flash::error('Conexiones not found');

            return redirect(route('conexiones.index'));
        }

        $conexiones = $this->conexionesRepository->update($request->all(), $id);

        Flash::success('Conexiones updated successfully.');

        return redirect(route('conexiones.index'));
    }

    /**
     * Remove the specified conexiones from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $conexiones = $this->conexionesRepository->findWithoutFail($id);

        if (empty($conexiones)) {
            Flash::error('Conexiones not found');

            return redirect(route('conexiones.index'));
        }

        $this->conexionesRepository->delete($id);

        Flash::success('Conexiones deleted successfully.');

        return redirect(route('conexiones.index'));
    }
}
